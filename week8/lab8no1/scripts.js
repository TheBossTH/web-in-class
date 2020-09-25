async function getDataFromAPI() {
  let response = await fetch("https://covid19.th-stat.com/api/open/cases");
  let rawData = await response.text();
  let objectData = JSON.parse(rawData);
  let result = document.getElementById("result");
  let totalmouth1 = 0;
  let totalmouth1_1_20 = 0;
  let totalmouth1_21_40 = 0;
  let totalmouth1_41_60 = 0;
  let totalmouth1_61 = 0;
  let totalmouth2 = 0;
  let totalmouth2_1_20 = 0;
  let totalmouth2_21_40 = 0;
  let totalmouth2_41_60 = 0;
  let totalmouth2_61 = 0;
  let date;
  var months = [
    "มกราคม",
    "กุมภาพันธ์",
    "มีนาคม",
    "เมษายน",
    "พฤษภาคม",
    "มิถุนายน",
    "กรกฎาคม",
    "สิงหาคม",
    "กันยายน",
    "ตุลาคม",
    "พฤศจิกายน",
    "ธันวาคม",
  ];

  let updatedate = objectData.UpdateDate.split("/");
  let updateyear = parseInt(updatedate[2]) + 543;
  document.getElementById("update").innerHTML +=
    updatedate[0] +
    " " +
    months[parseInt(updatedate[1] - 1)] +
    " " +
    updateyear;
  let endmonth1 = 0;
  for (let i = 0; i < parseInt(objectData.Data[0].No); i++) {
    date = objectData.Data[i].ConfirmDate.split("-", 3);
    if (parseInt(date[1]) == parseInt(updatedate[1])) {
      if (objectData.Data[i].Age < 21) {
        totalmouth1_1_20 += 1;
      } else if (objectData.Data[i].Age > 20 && objectData.Data[i].Age < 41) {
        totalmouth1_21_40 += 1;
      } else if (objectData.Data[i].Age > 40 && objectData.Data[i].Age < 61) {
        totalmouth1_41_60 += 1;
      } else {
        totalmouth1_61 += 1;
      }
    } else {
      endmonth1 = i;
      break;
    }
  }

  for (let i = endmonth1; i < parseInt(objectData.Data[0].No); i++) {
    date = objectData.Data[i].ConfirmDate.split("-", 3);
    if (parseInt(date[1]) == parseInt(updatedate[1] - 1)) {
      if (objectData.Data[i].Age < 21) {
        totalmouth2_1_20 += 1;
      } else if (objectData.Data[i].Age > 20 && objectData.Data[i].Age < 41) {
        totalmouth2_21_40 += 1;
      } else if (objectData.Data[i].Age > 40 && objectData.Data[i].Age < 61) {
        totalmouth2_41_60 += 1;
      } else {
        totalmouth2_61 += 1;
      }
    } else {
      break;
    }
  }

  totalmouth1 =
    totalmouth1_1_20 + totalmouth1_21_40 + totalmouth1_41_60 + totalmouth1_61;
  totalmouth2 =
    totalmouth2_1_20 + totalmouth2_21_40 + totalmouth2_41_60 + totalmouth2_61;
  let content1 =
    months[parseInt(updatedate[1] - 1)] +
    " " +
    updateyear +
    "(รวม " +
    totalmouth1 +
    " คน)" +
    "<ul><li>อายุ 1-20 จำนวน " +
    totalmouth1_1_20 +
    " คน</li>" +
    "<li>อายุ 21-40 จำนวน " +
    totalmouth1_21_40 +
    " คน</li>" +
    "<li>อายุ 41-60 จำนวน " +
    totalmouth1_41_60 +
    " คน</li>" +
    "<li>อายุ 61 ขึ้นไป จำนวน " +
    totalmouth1_61 +
    " คน</li></ul>";
  let li = document.createElement("li");
  li.innerHTML = content1;
  result.appendChild(li);

  let content3 =
    months[parseInt(updatedate[1] - 2)] +
    " " +
    updateyear +
    "(รวม " +
    totalmouth2 +
    " คน)" +
    "<ul><li>อายุ 1-20 จำนวน " +
    totalmouth2_1_20 +
    " คน</li>" +
    "<li>อายุ 21-40 จำนวน " +
    totalmouth2_21_40 +
    " คน</li>" +
    "<li>อายุ 41-60 จำนวน " +
    totalmouth2_41_60 +
    " คน</li>" +
    "<li>อายุ 61 ขึ้นไป จำนวน " +
    totalmouth2_61 +
    " คน</li></ul>";
  let li2 = document.createElement("li");
  li2.innerHTML = content3;
  result.appendChild(li2);
}
getDataFromAPI();
