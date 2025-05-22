<script>
    function display_c() {
        var refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct()', refresh)
        mytime2 = setTimeout('display_t()', refresh)
    }

    function display_ct() {
        var CDate = new Date();
        var NewDate = CDate.getDate() + "/" + (CDate.getMonth() + 1) + "/" + CDate.getFullYear();
        var Time = CDate.toLocaleTimeString();
        var FormattedDate = NewDate + " - " + Time;
        var FormattedDate2 = Time;
        var FormattedDate3 = NewDate;

        document.getElementById('ct').innerHTML = FormattedDate;

        display_c();
    }

    function display_t() {
        var CDate = new Date();
        var hours = CDate.getHours() % 12 || 12; // Convert 24-hour to 12-hour format, ensuring 12 remains 12
        var minutes = CDate.getMinutes().toString().padStart(2, '0');
        var seconds = CDate.getSeconds().toString().padStart(2, '0');

        var Time = hours + ":" + minutes + ":" + seconds;
        var NewDate = CDate.getDate() + "/" + (CDate.getMonth() + 1) + "/" + CDate.getFullYear();

        document.getElementById('timeInput').value = Time;
        document.getElementById('dateInput').value = NewDate;
        display_c();
    }
</script>