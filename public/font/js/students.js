//Chức năng xem thông tin giảng viên và chức năng thêm giảng viên
function studentFunc(evt, studentName) {
  var i, s_tabcontent, s_tablinks;
  s_tabcontent = document.getElementsByClassName("student_tabcontent");
  for (i = 0; i < s_tabcontent.length; i++) {
      s_tabcontent[i].style.display = "none";
  }
  s_tablinks = document.getElementsByClassName("student_tabcontent");
  for (i = 0; i < s_tablinks.length; i++) {
      s_tablinks[i].className = s_tablinks[i].className.replace(" active_s", "");
  }
  document.getElementById(studentName).style.display = "block";
  evt.currentTarget.className += " active_s";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("s_defaultOpen").click();