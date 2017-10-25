<div class="row">
        <ul class="collection with-header no-padding no-overflow">
            <li class="collection-header indigo accent-3 white-text">
                <h4 class="">Categorias</h4>
            </li>
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
</div>