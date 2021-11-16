let id = $("input[name*='ders_kodu']");
id.attr("readonly","readonly");

$(".btnedit").click(e=>{
	let textvalues =  displayData(e);
	let ders_adi = $("input[name*='ders_adi']");
	let akts = $("input[name*='akts']");
	let dk = $("input[name*='hoca']");
	let sinav_suresi = $("input[name*='sinav_suresi']");
	let soru_sayisi = $("input[name*='soru_sayisi']");
	let dogru_cevap_pauni = $("input[name*='dogru_cevap_puani']");
	let yanlis_cevap_pauni = $("input[name*='yanlis_cevap_puani']");

	id.val(textvalues[0]);
	ders_adi.val(textvalues[1]);
	akts.val(textvalues[2]);
	dk.val(textvalues[3]);
	sinav_suresi.val(textvalues[4]);
	soru_sayisi.val(textvalues[5]);
	dogru_cevap_pauni.val(textvalues[6]);
	yanlis_cevap_pauni.val(textvalues[7]);
});

function displayData(e){
	let id = 0;
	const td = $("#tbody tr td");
	let textvalues = [];
	for(const value of td){
		if (value.dataset.id == e.target.dataset.id) {
			textvalues[id++] = value.textContent;
		}
	}
	return textvalues;
}

