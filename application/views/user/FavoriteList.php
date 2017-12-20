<div class="container medium">
    <div class="row">
        <ul class="collection col s12">
            <?php foreach ($data as $professional) { ?>
                <li class="collection-item avatar">
                    <a href="<?= base_url('ProfessionalController/professionalProfile?id='.$professional['id'])?>">
                        <?php if( $professional['name_picture'] != NULL ) { ?>
                            <img src="<?=$professional['address_picture'].$professional['name_picture']  ?>" alt="" class="circle">
                        <?php } else { ?>
                            <img src="<?=base_url('public/images/user_man.png')  ?>" alt="" class="left">
                        <?php } ?>
                        <span class="title"><?=$professional['name']?></span>
                        <p> <?=$professional['email']?> </p>
                        <?php
                        if ($professional['certificate']) {
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