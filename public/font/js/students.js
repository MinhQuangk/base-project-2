function studentFunc(evt, studentName) {
  var i, s_tabcontent, s_tablinks;
  s_tabcontent = document.getElementsByClassName("student_tabcontent");
  for (i = 0; i < s_tabcontent.length; i++) {
    s_tabcontent[i].style.display = "none";
  }
  s_tablinks = document.getElementsByClassName("s_btn_tablinks");
  for (i = 0; i < s_tablinks.length; i++) {
    s_tablinks[i].className = s_tablinks[i].className.replace(" active_s", "");
  }
  document.getElementById(studentName).style.display = "block";
  evt.currentTarget.className += " active_s";
}
document.getElementById("s_defaultOpen").click();