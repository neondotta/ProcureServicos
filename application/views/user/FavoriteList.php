<div class="container medium">
    <div class="row">
        <ul class="collection col s12">
            <?php foreach ($professional as $data) { ?>
                <li class="collection-item avatar">
                    <a href="<?= base_url('ProfessionalController/professionalProfile?id='.$data['id'])?>">
                        <?php if( $data['name_picture'] != NULL ) { ?>
                            <img src="<?=$data['address_picture'].$data['name_picture']  ?>" alt="" class="left">
                        <?php } else { ?>
                            <img src="<?=base_url('public/images/user_man.png')  ?>" alt="" class="left">
                        <?php } ?>
                        <span class="title"><?=$data['name']?></span>
                        <p> <?=$data['email']?> </p>
                        <?php
                        if ($data['certificate']) {
                            ?>
                            <div class="secondary-content">
                                <i class="small material-icons teal-text">verified_user</i>
                            </div>
                            <?php
                        }
                        ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>