<input id="btnPrint" type="button" class="btn btn-primary print-btn" value="Print this page" onclick="printPage()"/>

<script type="text/javascript">
    function printPage() {
        var printButton = document.getElementById("btnPrint");
        printButton.style.visibility = 'hidden';
        window.print();
        printButton.style.visibility = 'visible';
    }
</script>