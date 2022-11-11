    // function openTab(evt, tabName){
    // var i, tabcontent, tablinks;
    // tabcontent = document.getElementsByClassName("tabcontent");
    //     for (i = 0; i < tabcontent.length; i++) {
    //         tabcontent[i].style.display = "none";
    //     }
        // tablinks = document.getElementsByClassName("tablinks");
        // for (i = 0;i < tablinks.length; i++){
        //     tablinks[i].className = tablinks[i].className.replace(" active", "");
        // }
    //     document.getElementById(tabName).style.display ="block";
    //     evt.currentTarget.className += " active";
    // }
    // document.getElementById('defaultOpen').click();
    function admin() {
        let hidden = document.getElementById('admin_details');
        if (hidden.style.display === 'none') {
            hidden.style.display = 'block';
        } else {
            hidden.style.display = 'none';
        }
    }
    document.getElementById('admin_details').click();