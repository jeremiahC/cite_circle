<div id="news" class="nav_identifier">
    <div class="ui active inverted dimmer" id="loader">
    <div class="ui large text loader">Loading</div>
</div>
<div id="displaynews" ></div>

<?php if($this->aauth->is_allowed('school_admin',$this->aauth->get_user_id($email=false))){?>
    <a class="btn-float pointer" id="options">
        <i class="inverted large plus icon"></i>
    </a>

    <div class="btn-options">
        <div class="column ">
            <a href="postcreate" class="circular ui teal icon button" id="shadow">
              <i class="icon write"></i>
            </a>
            <b>Create</b>
        </div>
        <div class="column">
            <button class="circular ui red icon button delete" id="shadow">
              <i class="icon trash"></i>
            </button>
            <b>Delete</b>
        </div>
    </div>
<?php }?>

</div>
<script>
$.getScript("<?php echo base_url()?>assets/js/news_index.js", function(){
    });

</script>