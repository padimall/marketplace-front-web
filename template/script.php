<!-- latest jquery-->
<script src="./assets/js/jquery-3.3.1.min.js"></script>

<!-- datatables-->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.22/datatables.min.js"></script>

<!-- slick js-->
<script src="./assets/js/slick.js"></script>

<!-- popper js-->
<script src="./assets/js/popper.min.js"></script>

<!-- Height js-->
<script src="./assets/js/equal-height.js"></script>

<!-- Timer js-->
<script src="./assets/js/menu.js"></script>

<!-- Bootstrap js-->
<script src="./assets/js/bootstrap.js"></script>

<!-- Theme js-->
<script src="./assets/js/script.js"></script>
<script src="./assets/js/modal.js"></script>

<script>
//datatable
$(document).ready(function() {
    $('#agent-supplier-list').DataTable();
});
</script>

<script>
//confirm modal delete produk agent
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

//update status supplier agent
$('.inputToggle').on('change', function() {
    var checkvalid = $(this).is(':checked');
    var targetID = $(this).val();

    if (checkvalid === true) {
        var status = 1
    } else {
        var status = 0
    }

    console.log(status)

    $.ajax({
        url: 'ajaxRequests.php',
        type: 'POST',
        data: 'target=' + targetID + '&status=' + status,
        success: function(hasil) {
            if (hasil == 1) {
                console.log("Berhasil memperbaharui");
                if (status == 1) {
                    document.getElementById("message_js").innerHTML =
                        `<span class="float-right badge badge-success p-1 mt-1">Berhasil menampilkan produk</span>`;
                } else {
                    document.getElementById("message_js").innerHTML =
                        `<span class="float-right badge badge-success p-1 mt-1">Berhasil menonaktifkan produk</span>`;
                }

            } else {
                console.log(hasil)
                console.log("Gagal memperbaharui");
                document.getElementById("message_js").innerHTML =
                    `<span class="float-right badge badge-danger p-1 mt-1">Gagal memperbaharui status</span>`;
            }
        }
    });
})
</script>