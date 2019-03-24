<div class="m-portlet m-portlet--blue m-portlet--head-solid-bg m-portlet--head-sm" >
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    GitHub Issues
                </h3>
            </div>
        </div>
     
    </div>
    <div id="tabela_issues" class="m-portlet__body">	

    </div>

</div>


<script>
    $(document).ready(function () {
        $(".datatable").DataTable({
            paging: false
        });

        blockPage();
        $("#tabela_issues").load("sistema/issues/tabela", {}, function () {
            unblockPage();
        });
    });
</script>


