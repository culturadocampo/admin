<?php
$issues = GITHUB::get_issues();
?>



<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    Issues
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">	
        <table class="table datatable table-hover" style="border: 1px solid #ECEFF1;">
            <thead style="display: none">
                <tr>
                    <!--<td width="5%" class="text-center">ID</td>-->
                    <td>Título</td>
                    <td>Data</td>
                    <td>Responsáveis</td>
                    <td>Comentários</td>
                </tr>
            </thead>
            <tbody>
                <?php if ($issues) { ?>

                    <?php foreach ($issues as $value) { ?>
                        <tr style="border-bottom: 1px solid black!important; background: #fefefe">
                            <!--<td class="text-center"><?php // echo $value['number'];    ?></td>-->
                            <td>
                                <span class="font-weight-bold text-dark" style="font-size: 14px"><?php echo $value['title']; ?></span>
                                <br>
                                <small class="text-muted">
                                    #<?php echo $value['number']; ?> 
                                    aberto no dia <?php echo strftime("%d de %b, %Y", strtotime($value['created_at'])); ?>
                                    por <?php echo $value['user']['login']; ?>
                                </small>
                            </td>
                            <td class='text-dark'>
                                <?php if ($value['labels']) { ?>
                                    <?php foreach ($value['labels'] as $label) { ?>
                                        <label class="badge" style="color:white; background-color: #<?php echo $label['color'] ?>"><?php echo $label['name']; ?></label>
                                    <?php } ?>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($value['assignees']) { ?>
                                    <?php foreach ($value['assignees'] as $assignee) { ?>
                                        <?php if ($assignee['login'] !== "culturadocampo") { ?>
                                            <img title="<?php echo $assignee['login']; ?>" class="issue_avatar" width="26px" height="auto" src='<?php echo $assignee['avatar_url']; ?>'>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($value['comments'] > 0) { ?>
                                <i style="font-size: 16px;" class="flaticon-comment"></i>
                                <span style="font-size: 16px;"><?php echo $value['comments']; ?></span>
                                <?php } ?>

                            </td>
                        </tr>
                    <?php } ?>

                <?php } ?>
            </tbody>
        </table>
    </div>

</div>


<script>
    $(document).ready(function () {
        $(".datatable").DataTable({
            paging: false
        });
    });
</script>


<?php
ARRAYS::pre_print($issues, false);
?>