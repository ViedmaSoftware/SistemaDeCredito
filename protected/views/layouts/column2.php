

<?php $this->beginContent('//layouts/main'); ?>

<div class="row-fluid">
    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    
    <div class="span3">
        <div id="content">
            <?php $this->widget('bootstrap.widgets.TbNav', array(
                        'type' => TbHtml::NAV_TYPE_LIST,
                        'items' => array_merge(array(array('label' => 'Operaciones'),TbHtml::menuDivider(),),
                                               $this->menu),
                        
                    ));
                   
             ?>
           
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>