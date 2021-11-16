
<?php
$secilen_deger = "";
require_once ("dizi.php");
$con = mysqli_connect("localhost", "root", "", "userinformation");
if (isset($_POST['create']))
{
    createData();
}

if (isset($_POST['update']))
{
    updateData();
}

if (isset($_POST['delete']))
{
    deleteRecord();
}
if (isset($_POST['deleteall']))
{
    deleteAll();
}
if (isset($_POST['soru_kaydet'])) 
{
    insertQuestion();
}

function createData()
{
    $ders_kodu = textboxValue("ders_kodu");
    $ders_adi = textboxValue("ders_adi");
    $akts = textboxValue("akts");
    $hoca = textboxValue("hoca");
    $sinav_suresi = textboxValue("sinav_suresi");
    $soru_sayisi = textboxValue("soru_sayisi");
    $dogru_cevap_puani = textboxValue("dogru_cevap_puani");
    $yanlis_cevap_puani = textboxValue("yanlis_cevap_puani");

    if ($ders_adi && $akts && $hoca && $soru_sayisi)
    {
        $sql = "INSERT INTO subjects(id,ders_adi,AKTS,dersin_koordinatoru,sinav_suresi,soru_sayisi,dogru_cevap_puani,yanlis_cevap_puani) VALUES('$ders_kodu','$ders_adi','$akts','$hoca','$sinav_suresi','$soru_sayisi','$dogru_cevap_puani','$yanlis_cevap_puani')";
        if (mysqli_query($GLOBALS['con'], $sql))
        {
            TextNode("success", "Eklendi!");
        }
        else
        {
            TextNode("error", "Bilgiler mevcuttur");
        }
    }
    else
    {
        TextNode("error", "Boş alanı doldurun!");
    }
}

function textboxValue($value)
{
    $con = mysqli_connect("localhost", "root", "", "userinformation");
    $textbox = mysqli_real_escape_string($con, trim($_POST[$value]));
    if (empty($textbox))
    {
        return false;
    }
    else
    {
        return $textbox;
    }
}

function TextNode($classname, $msg)
{
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

function getData()
{
    $sql = "SELECT * FROM subjects";
    $result = mysqli_query($GLOBALS['con'], $sql);
    if (mysqli_num_rows($result) > 0)
    {
        return $result;
    }
}
function updateData()
{
    $id = textboxValue("ders_kodu");
    $ders_adi = textboxValue("ders_adi");
    $akts = textboxValue("akts");
    $dk = textboxValue("hoca");
    $sinav_suresi = textboxValue("sinav_suresi");
    $soru_sayisi = textboxValue("soru_sayisi");
    $dogru_cevap_puani = textboxValue("dogru_cevap_puani");
    $yanlis_cevap_puani = textboxValue("yanlis_cevap_puani");

    if ($ders_adi && $akts && $dk && $soru_sayisi)
    {
        $sql = "
				UPDATE subjects SET ders_adi='$ders_adi',AKTS='$akts',dersin_koordinatoru='$dk',sinav_suresi='$sinav_suresi',soru_sayisi='$soru_sayisi',dogru_cevap_puani='$dogru_cevap_puani',yanlis_cevap_puani='$yanlis_cevap_puani' WHERE id='$id'
				";
        if (mysqli_query($GLOBALS['con'], $sql))
        {
            TextNode("success", "Başarılıyla güncellendi!");
        }
        else
        {
            TextNode("error", "güncellenemedi!");
        }
    }
    else
    {
        TextNode("error", "değiştire basın!");
    }
}

function deleteRecord()
{
    $id = (int)textboxValue("ders_kodu");
    $sql = "
			DELETE FROM subjects WHERE id='$id'
		";
    if (mysqli_query($GLOBALS['con'], $sql))
    {
        TextNode("success", "Başarılıyla silindi!");
    }
    else
    {
        TextNode("error", "silinemedi!");
    }
}

function deleteBtn()
{
    $result = getData();
    $i = 0;
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $i++;
            if ($i > 3)
            {
                buttonElement("btn-deleteall", "btn btn-danger", "<i class='fas fa-trash'></i> Hepsini sil", "deleteall", "");
                return;
            }
        }
    }
}

function deleteAll()
{
    $sql = "DROP TABLE subjects";
    if (mysqli_query($GLOBALS['con'], $sql))
    {
        TextNode("success", "bütün Bilgiler silindi");
        createTable();
    }
    else
    {
        TextNode("error", "silinemedi");
    }
}

function setID()
{
    $getid = getData();
    $id = 0;
    if ($getid)
    {
        while ($row = mysqli_fetch_assoc($getid))
        {
            $id = $row['id'];
        }
    }
    return ($id + 1);
}

function createTable()
{
    $con = mysqli_connect("localhost", "root", "", "userinformation");
    $sql = "
			CREATE TABLE IF NOT EXISTS subjects(
				id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				ders_adi VARCHAR(25) NOT NULL,
				AKTS VARCHAR(5) NOT NULL,
				dersin_koordinatoru VARCHAR(30),
				soru_sayisi INT(5),
				sinav_suresi INT(5),
				dogru_cevap_puani INT(5),
				yanlis_cevap_puani INT(5)
			);
		";
    if (mysqli_query($GLOBALS['con'], $sql))
    {
        TextNode("success", "tablo oluşturuldu!");
    }
    else
    {
        TextNode("error", "tablo oluşturulamadi!");
    }
}
function insertQuestion()
{
    $secilen_deger = textboxValue("takeSelect");
    $soru_metni = textboxValue("soru_metni");
    $shk1 = textboxValue("shk1");
    $shk2 = textboxValue("shk2");
    $shk3 = textboxValue("shk3");
    $shk4 = textboxValue("shk4");
    $dogru_cevap = textboxValue("dogru_cevap");
    if ($soru_metni) 
    {


    $sql = "INSERT INTO questions 
    SET soru = '$soru_metni',
       ders_kodu = (
       SELECT id
         FROM subjects
        WHERE id = '$secilen_deger')";
    $result1 = mysqli_query($GLOBALS['con'], $sql);

    $soru_kodu = mysqli_insert_id($GLOBALS['con']);

    $sql1 = "INSERT INTO question_options 
    SET shk1 = '$shk1',shk2 = '$shk2',shk3 = '$shk3',shk4 = '$shk4',dogru_cevap = '$dogru_cevap',
       soru_kodu = (
       SELECT id
         FROM questions
        WHERE id = '$soru_kodu')";
    $result2 = mysqli_query($GLOBALS['con'], $sql1);

        if ($result1 && $result2)
        {
            TextNode("success","soru Başarılıyla Eklendi...!");
        }
        else
        {
            TextNode("error","soru mevcuttur...!");
        }
    }
    else
    {
        TextNode("error","soru alanı boş...!");
    }

    // $question_num = "SELECT soru_sayisi FROM subjects WHERE id = '$secilen_deger'";
    // $num_query = mysqli_query($GLOBALS['con'], $question_num);
    // $num_fetch = mysqli_fetch_assoc($num_query);
    // $soru_sayisi =  $num_fetch['soru_sayisi'];
    // while ($soru_sayisi > 0)
    // {
    //     echo "<script>$('#soruekle').modal('show');</script>";
    //     $soru_sayisi -= 1;
    // }
}
?>
