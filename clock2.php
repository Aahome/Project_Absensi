<div class="form-group">
    <label>Jam</label>
    <input type="text" name="nama_txt" id="t" class="form-control w200" >
</div>
<div class="form-group">
    <label>Tanggal</label>
    <input type="date" name="nama_txt" id="d" class="form-control w200" >
</div>
<a id="ct"></a>

<script>

     

    function display_ct() {
    var CDate = new Date();
    var NewDate = CDate.getDate() + "/" + (CDate.getMonth() + 1) + "/" + CDate.getFullYear();
    var Time = CDate.toLocaleTimeString('en-GB', { hour12: false }); 
    var FormattedDate = NewDate + " - " + Time;
    var FormattedDate2 = Time;
    var FormattedDate3 = NewDate;

    document.getElementById('ct').innerHTML = FormattedDate;
    document.getElementById('t').innerHTML = FormattedDate2;
    document.getElementById('d').innerHTML = FormattedDate3;
}

</script>