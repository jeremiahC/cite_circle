<?php foreach ($information as $info) {?>
<div class="ui centered grid">
    <div class="two column row">
        <div class="five wide column">
            <div class="ui teal segment">
                <h3 class="ui header">
                  Personal Info
                </h3>
                <div class="column">
                  <label><b>First name:</b></label>
                  <?php echo $info->firstname;?>
                </div>
                <div class="column">
                  <label><b>Last name:</b></label>
                  <?php echo $info->lastname;?>
                </div>
                <div class="column">
                  <label><b>Age:</b></label>
                  <?php echo $info->age;?>
                </div>
                <div class="column">
                  <label><b>Gender:</b></label>
                  <?php echo $info->gender;?>
                </div>
            </div>
            <?if($this->aauth->get_user_id($email=false) === $info->user_id):?>
              <a href="ProfileController/editUpdateProfile" class="fluid ui inverted green button">Update Info</a>
            <?endif;?>
        </div>
        <div class="four wide column">
            <div class="ui red segment">
              <h4>
                  <i class="birthday icon"></i>
                  Birthday
              </h4>
              <?php echo $info->birthday;?>
            </div>
            <div class="ui orange segment">
              <h4>
                  <i class="text telephone icon"></i>
                  Contact Number
              </h4>
              +63<?php echo $info->contact_number;?>
            </div>
            <div class="ui blue segment">
              <h4>
                  <i class="marker icon"></i>
                  Address
              </h4>
              <?php echo $info->address;?>
            </div>
        </div>
    </div>
</div>

<?php };?>