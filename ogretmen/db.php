<?php
require_once __DIR__ . '/../bootstrap.php';
$con = db();
require_once __DIR__ . '/dizi.php';

if (($_POST['create'] ?? '') !== '') {
    createData();
} elseif (($_POST['update'] ?? '') !== '') {
    updateData();
} elseif (($_POST['delete'] ?? '') !== '') {
    deleteRecord();
} elseif (($_POST['deleteall'] ?? '') !== '') {
    deleteAll();
} elseif (($_POST['soru_kaydet'] ?? '') !== '') {
    insertQuestion();
}

function textboxValue(string $name): ?string
{
    if (!isset($_POST[$name])) {
        return null;
    }
    $value = trim((string) $_POST[$name]);
    return $value === '' ? null : $value;
}

function TextNode(string $className, string $message): void
{
    echo "<h6 class=\"" . htmlspecialchars($className) . "\">" . htmlspecialchars($message) . "</h6>";
}

function createData(): void
{
    $values = [
        textboxValue('ders_adi'), textboxValue('akts'), textboxValue('hoca'),
        textboxValue('sinav_suresi'), textboxValue('soru_sayisi'),
        textboxValue('dogru_cevap_puani'), textboxValue('yanlis_cevap_puani')
    ];
    if (in_array(null, $values, true)) {
        TextNode('error', 'Bos alanlari doldurun.');
        return;
    }

    $stmt = db()->prepare('INSERT INTO subjects (ders_adi, AKTS, dersin_koordinatoru, sinav_suresi, soru_sayisi, dogru_cevap_puani, yanlis_cevap_puani) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sssiiii', $values[0], $values[1], $values[2], $values[3], $values[4], $values[5], $values[6]);
    try {
        $stmt->execute();
        TextNode('success', 'Eklendi.');
    } catch (mysqli_sql_exception $exception) {
        TextNode('error', 'Kayit eklenemedi.');
    }
}

function getData(): ?mysqli_result
{
    $result = db()->query('SELECT * FROM subjects ORDER BY id');
    return $result->num_rows ? $result : null;
}

function updateData(): void
{
    $id = (int) textboxValue('ders_kodu');
    $name = textboxValue('ders_adi');
    $akts = textboxValue('akts');
    $coordinator = textboxValue('hoca');
    $duration = (int) textboxValue('sinav_suresi');
    $questionCount = (int) textboxValue('soru_sayisi');
    $correct = (int) textboxValue('dogru_cevap_puani');
    $wrong = (int) textboxValue('yanlis_cevap_puani');

    if ($id < 1 || !$name || !$akts || !$coordinator) {
        TextNode('error', 'Guncellenecek kayit bilgileri eksik.');
        return;
    }
    $stmt = db()->prepare('UPDATE subjects SET ders_adi=?, AKTS=?, dersin_koordinatoru=?, sinav_suresi=?, soru_sayisi=?, dogru_cevap_puani=?, yanlis_cevap_puani=? WHERE id=?');
    $stmt->bind_param('sssiiiii', $name, $akts, $coordinator, $duration, $questionCount, $correct, $wrong, $id);
    $stmt->execute();
    TextNode($stmt->affected_rows >= 0 ? 'success' : 'error', $stmt->affected_rows >= 0 ? 'Basariyla guncellendi.' : 'Guncellenemedi.');
}

function deleteRecord(): void
{
    $id = (int) textboxValue('ders_kodu');
    $stmt = db()->prepare('DELETE FROM subjects WHERE id=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    TextNode($stmt->affected_rows > 0 ? 'success' : 'error', $stmt->affected_rows > 0 ? 'Basariyla silindi.' : 'Kayit bulunamadi.');
}

function deleteBtn(): void
{
    $result = getData();
    if ($result && $result->num_rows > 3) {
        buttonElement('btn-deleteall', 'btn btn-danger', "<i class='fas fa-trash'></i> Hepsini sil", 'deleteall', "");
    }
}

function deleteAll(): void
{
    db()->query('DELETE FROM subjects');
    db()->query('ALTER TABLE subjects AUTO_INCREMENT = 1');
    TextNode('success', 'Butun bilgiler silindi.');
}

function setID(): int
{
    $row = db()->query('SELECT COALESCE(MAX(id), 0) + 1 AS next_id FROM subjects')->fetch_assoc();
    return (int) $row['next_id'];
}

function createTable(): void
{
    db()->query(
        'CREATE TABLE IF NOT EXISTS subjects(
            id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            ders_adi VARCHAR(100) NOT NULL,
            AKTS VARCHAR(5) NOT NULL,
            dersin_koordinatoru VARCHAR(100),
            soru_sayisi INT UNSIGNED,
            sinav_suresi INT UNSIGNED,
            dogru_cevap_puani INT UNSIGNED,
            yanlis_cevap_puani INT UNSIGNED
        ) ENGINE=InnoDB'
    );
}

function insertQuestion(): void
{
    $subjectId = (int) textboxValue('takeSelect');
    $question = textboxValue('soru_metni');
    $choices = [
        textboxValue('shk1'), textboxValue('shk2'),
        textboxValue('shk3'), textboxValue('shk4')
    ];
    $correct = (int) textboxValue('dogru_cevap');

    if (!$subjectId || !$question || in_array(null, $choices, true) || $correct < 1 || $correct > 4) {
        TextNode('error', 'Soru ve tum siklari doldurun.');
        return;
    }

    $subject = db()->prepare('SELECT id FROM subjects WHERE id=?');
    $subject->bind_param('i', $subjectId);
    $subject->execute();
    if (!$subject->get_result()->fetch_assoc()) {
        TextNode('error', 'Secilen sinav bulunamadi.');
        return;
    }

    db()->begin_transaction();
    try {
        $questionStmt = db()->prepare('INSERT INTO questions (ders_kodu, soru) VALUES (?, ?)');
        $questionStmt->bind_param('is', $subjectId, $question);
        $questionStmt->execute();
        $questionId = $questionStmt->insert_id;

        $optionStmt = db()->prepare('INSERT INTO question_options (soru_kodu, shk1, shk2, shk3, shk4, dogru_cevap) VALUES (?, ?, ?, ?, ?, ?)');
        $optionStmt->bind_param('issssi', $questionId, $choices[0], $choices[1], $choices[2], $choices[3], $correct);
        $optionStmt->execute();
        db()->commit();
        TextNode('success', 'Soru basariyla eklendi.');
    } catch (Throwable $exception) {
        db()->rollback();
        TextNode('error', 'Soru kaydedilemedi.');
    }
}
