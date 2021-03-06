<?php
/**
 * View/set all settings.
 *
 * @copyright	Copyright &copy; 2012 Hardalau Claudiu 
 * @package		bum
 * @license		New BSD License 
 * 
 */

/* @var $this SettingsController */

$this->breadcrumbs=array(
	'Settings',
);


$cs = Yii::app()->getClientScript();
$cs->registerCssFile(Yii::app()->getModule("bum")->assetsUrl . '/css/customizeEmails.css');

$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->getModule("bum")->assetsUrl . '/js/invitations.js');

$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->getModule("bum")->assetsUrl . '/js/customizeEmails.js');

  
$this->menu=array(    
	array('label'=>'Install', 'url'=>array('install/index'), 'visible'=>(Yii::app()->getModule("bum")->install)),
	array('template'=>'<HR style="margin:0 auto;"/>', 'visible'=>(Yii::app()->getModule("bum")->install)), // separator
    
	array('label'=>'Settings', 'url'=>array('settings/batchUpdate'), 'visible'=>(Yii::app()->user->checkAccess("settings_manage"))),
	array('template'=>'<HR style="margin:0 auto;"/>', 'visible'=>(Yii::app()->user->checkAccess("settings_manage"))), // separator
    
	array('label'=>'My Profile (' . Yii::app()->user->name . ')', 'url'=>array('users/viewMyPrivateProfile', 'id'=>Yii::app()->user->id), 'visible'=>(Yii::app()->user->checkAccess("users_manage") && (!isset($model) || Yii::app()->user->id != $model->id))),
    
	array('template'=>'<HR style="margin:0 auto;"/>'), // separator
    
	array('label'=>'invite', 'url'=>'#', 
        'linkOptions'=>array(
                'onclick'=>'invitationDialog(
                        "' . Yii::app()->createUrl(Yii::app()->getModule("bum")->name . "/invitations/AJAXCreate", array('id_user'=>Yii::app()->user->id)) . '",
                        "' . Yii::app()->createUrl(Yii::app()->getModule("bum")->name . "/invitations/AJAXView", array('id_user'=>Yii::app()->user->id)) . '"
                    );' 
            ), 
        'visible'=>(!Yii::app()->user->isGuest && Yii::app()->getModule('bum')->invitationButtonDisplay)),
	array('template'=>'<HR style="margin:0 auto;"/>', 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->getModule('bum')->invitationButtonDisplay)), // separator
    
	array('label'=>'Manage Users', 'url'=>array('users/admin'), 'visible'=>Yii::app()->user->checkAccess("users_admin")),
	array('label'=>'Create User', 'url'=>array('users/create'), 'visible'=>Yii::app()->user->checkAccess("users_create")),
	array('label'=>'View all Users', 'url'=>array('users/viewAllUsers'), 'visible'=>Yii::app()->user->checkAccess("users_all_view"), 'active'=>true),
    
	array('template'=>'<HR style="margin:0 auto;"/>', 'visible'=>(Yii::app()->getModule("bum")->logInIfNotVerified && !Yii::app()->user->active && !Yii::app()->user->isGuest)), // separator
	array('label'=>'Resend Confirm. Email', 'url'=>array('users/resendSignUpConfirmationEmail'), 'visible'=>(Yii::app()->getModule("bum")->logInIfNotVerified && !Yii::app()->user->active && !Yii::app()->user->isGuest)),
);

/* Send an invitation dialog box */
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'Invite',
    'options'=>array(
        'autoOpen'=>false,
        'modal'=>true,
    )
));
    ?><DIV id="dlg_history_content"></DIV><?php
    ?><DIV id="dlg_invite_content"></DIV><?php
    ?><div id="AjaxLoader" style="display: none; margin: 0 auto; text-align: center;"><IMG src="<?php echo Yii::app()->getModule("bum")->assetsUrl; ?>/images/spinner.gif" width="60px" height="60px" /></div><?php
$this->endWidget('zii.widgets.jui.CJuiDialog');

?><div class="form">
    <?php echo CHtml::beginForm(); ?>
        <TABLE>
            <TR><TH></TH><TH>Value</TH></TR><?php 
            
            foreach($settings as $i=>$setting): 
                switch ($setting->name){
                    case 'logInIfNotVerified':
                            ?><TR>
                                <TD><?php 
                                    echo CHtml::activeHiddenField($setting, "[$i]name");
                                    echo CHtml::activeHiddenField($setting, "[$i]label");
                                    echo CHtml::label($setting->label,"Settings[$i]value"); 
                                ?></TD>
                                <TD><?php 
                                    echo CHtml::activeDropDownList($setting,"[$i]value", Settings::getLogInIfNotVerifiedOptions()); 
                                ?></TD>
                            </TR><?php
                            ?><TR><TD colspan="2"><?php 
                                    echo CHtml::openTag("SPAN", array("name"=>"Settings[$i]description")); 
                                    echo $setting->description; 
                                    echo CHtml::closeTag("SPAN");
                                    
                                    echo '<HR/>';
                            ?></TD></TR><?php
                        break;
                    case 'invitationBasedSignUp':
                            ?><TR>
                                <TD><?php 
                                    echo CHtml::activeHiddenField($setting, "[$i]name");
                                    echo CHtml::activeHiddenField($setting, "[$i]label");
                                    echo CHtml::label($setting->label,"Settings[$i]value"); 
                                ?></TD>
                                <TD><?php 
                                    echo CHtml::activeDropDownList($setting,"[$i]value", Settings::getInvitationBasedOptions()); 
                                ?></TD>
                            </TR><?php
                            ?><TR><TD colspan="2"><?php 
                                    echo CHtml::openTag("SPAN", array("name"=>"Settings[$i]description")); 
                                    echo $setting->description; 
                                    echo CHtml::closeTag("SPAN");
                                    
                                    echo '<HR/>';
                            ?></TD></TR><?php
                        break;
                    case 'invitationButtonDisplay':
                            ?><TR>
                                <TD><?php 
                                    echo CHtml::activeHiddenField($setting, "[$i]name");
                                    echo CHtml::activeHiddenField($setting, "[$i]label");
                                    echo CHtml::label($setting->label,"Settings[$i]value"); 
                                ?></TD>
                                <TD><?php 
                                    echo CHtml::activeDropDownList($setting,"[$i]value", Settings::getInvitationDisplayButtonOptions()); 
                                ?></TD>
                            </TR><?php
                            ?><TR><TD colspan="2"><?php 
                                    echo CHtml::openTag("SPAN", array("name"=>"Settings[$i]description")); 
                                    echo $setting->description; 
                                    echo CHtml::closeTag("SPAN");
                                    
                                    echo '<HR/>';
                            ?></TD></TR><?php
                        break;
                    case 'enabledSignUp':
                            ?><TR>
                                <TD><?php 
                                    echo CHtml::activeHiddenField($setting, "[$i]name");
                                    echo CHtml::activeHiddenField($setting, "[$i]label");
                                    echo CHtml::label($setting->label,"Settings[$i]value"); 
                                ?></TD>
                                <TD><?php 
                                    echo CHtml::activeDropDownList($setting,"[$i]value", Settings::getSignUpEnabledOptions()); 
                                ?></TD>
                            </TR><?php
                            ?><TR><TD colspan="2"><?php 
                                    echo CHtml::openTag("SPAN", array("name"=>"Settings[$i]description")); 
                                    echo $setting->description; 
                                    echo CHtml::closeTag("SPAN");
                                    
                                    echo '<HR/>';
                            ?></TD></TR><?php
                        break;
                    case 'trackPasswordRecoveryRequests':
                            ?><TR>
                                <TD><?php 
                                    echo CHtml::activeHiddenField($setting, "[$i]name");
                                    echo CHtml::activeHiddenField($setting, "[$i]label");
                                    echo CHtml::label($setting->label,"Settings[$i]value"); 
                                ?></TD>
                                <TD><?php 
                                    echo CHtml::activeDropDownList($setting,"[$i]value", Settings::getTrackPasswordRecoveryRequestsOptions()); 
                                ?></TD>
                            </TR><?php
                            ?><TR><TD colspan="2"><?php 
                                    echo CHtml::openTag("SPAN", array("name"=>"Settings[$i]description")); 
                                    echo $setting->description; 
                                    echo CHtml::closeTag("SPAN");
                                    
                                    echo '<HR/>';
                            ?></TD></TR><?php
                        break;
                    case 'enabledSignUpThankYou':
                            ?><TR>
                                <TD><?php 
                                    echo CHtml::activeHiddenField($setting, "[$i]name");
                                    echo CHtml::activeHiddenField($setting, "[$i]label");
                                    echo CHtml::label($setting->label,"Settings[$i]value"); 
                                ?></TD>
                                <TD><?php 
                                    echo CHtml::activeDropDownList($setting,"[$i]value", Settings::getsSignUpThankYouOptions()); 
                                ?></TD>
                            </TR><?php
                            ?><TR><TD colspan="2"><?php 
                                    echo CHtml::openTag("SPAN", array("name"=>"Settings[$i]description")); 
                                    echo $setting->description; 
                                    echo CHtml::closeTag("SPAN");
                                    
                                    echo '<HR/>';
                            ?></TD></TR><?php
                        break;
                    
                    case 'sender_invitation':
                    case 'sender_signUp':
                    case 'sender_signUp_thankYou':
                    case 'sender_registerNewEmail':
                    case 'sender_passwordRecovery':
                            ?><TR>
                                <TD><?php 
                                    echo CHtml::activeHiddenField($setting, "[$i]name");
                                    echo CHtml::activeHiddenField($setting, "[$i]label");
                                    echo CHtml::label($setting->label,"Settings[$i]value"); 
                                ?></TD>
                                <TD><?php 
                                    echo CHtml::activeTextField($setting,"[$i]value", array('size'=>45,'maxlength'=>45)); 
                                    if(Yii::app()->user->checkAccess('settings_emails_customization')){
                                        echo CHtml::button("customize email", array('onclick'=>'customizeEmailsDialog(
                                            "' . Yii::app()->createUrl(Yii::app()->getModule("bum")->name . "/siteEmailsContent/AJAXUpdate", array('name'=>$setting->name)) . '"
                                        );'));
                                    }
                                ?></TD>
                            </TR><?php
                            ?><TR><TD colspan="2"><?php 
                                    echo CHtml::openTag("SPAN", array("name"=>"Settings[$i]description")); 
                                    echo $setting->description; 
                                    echo CHtml::closeTag("SPAN");
                                    
                                    echo '<HR/>';
                            ?></TD></TR><?php
                        break;
                    case 'twitter_key':
                    case 'twitter_secret':
                    case 'fb_appId':
                    case 'fb_secret':
                            ?><TR>
                                <TD><?php 
                                    echo CHtml::activeHiddenField($setting, "[$i]name");
                                    echo CHtml::activeHiddenField($setting, "[$i]label");
                                    echo CHtml::label($setting->label,"Settings[$i]value"); 
                                ?></TD>
                                <TD><?php 
                                    if(Yii::app()->getModule('bum')->demoMode){
                                        echo 'Demo mode is active! You are not allowed to see or edit this field!';
                                    }else{
                                        echo CHtml::activeTextField($setting,"[$i]value", array('size'=>45,'maxlength'=>45)); 
                                    }
                                ?></TD>
                            </TR><?php
                            ?><TR><TD colspan="2"><?php 
                                    echo CHtml::openTag("SPAN", array("name"=>"Settings[$i]description")); 
                                    echo $setting->description; 
                                    echo CHtml::closeTag("SPAN");
                                    
                                    echo '<HR/>';
                            ?></TD></TR><?php
                        break;    
                    default:
                            ?><TR>
                                <TD><?php 
                                    echo CHtml::activeHiddenField($setting, "[$i]name");
                                    echo CHtml::activeHiddenField($setting, "[$i]label");
                                    echo CHtml::label($setting->label,"Settings[$i]value"); 
                                ?></TD>
                                <TD><?php 
                                    echo CHtml::activeTextField($setting,"[$i]value", array('size'=>45,'maxlength'=>45)); 
                                ?></TD>
                            </TR><?php
                            ?><TR><TD colspan="2"><?php 
                                    echo CHtml::openTag("SPAN", array("name"=>"Settings[$i]description")); 
                                    echo $setting->description; 
                                    echo CHtml::closeTag("SPAN");
                                    
                                    echo '<HR/>';
                            ?></TD></TR><?php
                        break;
                }
            endforeach; ?>
        </TABLE>

        <?php echo CHtml::submitButton('Save'); ?>
    <?php echo CHtml::endForm(); ?>
</div><!-- form --><?php

/* Send an invitation dialog box */
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'customize_email',
    'options'=>array(
        'autoOpen'=>false,
        'modal'=>true,
    )
));
    ?><div id="AjaxLoader_costomize_email" style="display: none; margin: 0 auto; text-align: center;"><IMG src="<?php echo Yii::app()->getModule("bum")->assetsUrl; ?>/images/spinner.gif" width="60px" height="60px" /></div><?php
    ?><DIV id="dlg_customize_email"></DIV><?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
