<div class="row">
        <ul class="collection with-header no-padding no-overflow">
            <li class="collection-header blue darken-4 white-text padding-5">Categorias</li>
            <?php
                foreach ($categories as $value){
            ?>
                    <li class="collection-item categories">
                        <span><?=$value['category']?></span>
                        <a href="#!" class="secondary-content red-text darken-1"><i class="material-icons">delete</i></a>
                    </li>
            <?php
                }
            ?>
            <li class="collection-hidden padding-0-30" id="collection-categories">
                <div>
                    <?php
                        echo form_open('CategoryController/addCategoryProfessional');
                            echo form_hidden('professionalId',$professional['id']);
                            $class = [
                                    'id' => 'loadCategories',
                                    'multiple' => 'multiple'
                                ];
                            $options = [];

                            echo form_dropdown('category[]', $options, '',$class);
                    ?>
                        <button class="btn-floating btn-medium waves-effect waves-light secondary-content indigo accent-3 margin-b-10 no-float">
                            <i class="material-icons">send</i>
                        </button>
                    <?php
                        echo form_close();
                    ?>
                </div>
            </li>
        </ul>
        <a class="btn-floating btn-medium waves-effect waves-light red darken-1 right margin-r-10" href="#" id="js-collection-button">
            <i class="material-icons">add</i>
        </a>
        <ul class="collection with-header col s12 no-padding no-overflow" id="rating-professional">
            <li class="collection-header blue darken-4 white-text padding-5">Minha Avaliação</li>
            <li class="padding-5 flex-center">
                <div id="circle-rating" class="col s3">
                    <span class="col s12 no-padding blue-text text-darken-4"><?= $professional['evaluation'] ?></span>
                </div>
                <div class="col s8 offset-s1 no-padding">
                    <?php if ($professional['amount_service'] > 0) { ?>
                        <p class="no-padding"><?= $professional['amount_service'] ?> avaliações(s) até o
                            momento.</p>
                    <?php } else { ?>
                        <p class="no-padding">Profissional sem avaliação.</p>
                    <?php } ?>
                </div>
            </li>
        </ul>
</div>