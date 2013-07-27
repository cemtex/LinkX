<?php
if( !defined('LINKX') ) die("Access denied");

$type_options = array(FT_TEXT => FT_TEXT,
                      FT_TEXTAREA => FT_TEXTAREA,
                      FT_SELECT => FT_SELECT,
                      FT_CHECKBOX => FT_CHECKBOX);

$validation_options = array(V_NONE => 'None',
                            V_ALPHANUM => 'Alphanumeric',
                            V_BETWEEN => 'Between',
                            V_EMAIL => 'E-mail Address',
                            V_GREATER => 'Greater Than',
                            V_LESS => 'Less Than',
                            V_LENGTH => 'Length',
                            V_NUMERIC => 'Numeric',
                            V_REGEX => 'Regular Expression',
                            V_URL => 'HTTP URL',
                            V_URL_WORKING_300 => 'Working URL (Redirection OK)',
                            V_URL_WORKING_400 => 'Working URL (No Redirection)');

define('NODTD', TRUE);
include_once('includes/header.php');
?>

<script language="JavaScript">
<?PHP if( $GLOBALS['added'] ): ?>
if( typeof window.parent.Search == 'object' )
    window.parent.Search.search(false);
<?PHP endif; ?>
</script>

<div style="padding: 10px;">
    <form action="index.php" method="POST" id="form">
    <div class="margin-bottom">
      <div style="float: right;">
        <a href="docs/user-fields.html" target="_blank"><img src="images/help.png" border="0" alt="Help" title="Help"></a>
      </div>
      <?php if( $editing ): ?>
      Update this account field by making changes to the information below
      <?php else: ?>
      Add a new account field by filling out the information below
      <?php endif; ?>
    </div>

        <?php if( $GLOBALS['message'] ): ?>
        <div class="notice margin-bottom">
          <?php echo $GLOBALS['message']; ?>
        </div>
        <?php endif; ?>

        <?php if( $GLOBALS['errstr'] ): ?>
        <div class="alert margin-bottom">
          <?php echo $GLOBALS['errstr']; ?>
        </div>
        <?php endif; ?>

        <fieldset>
          <legend>General Information</legend>

        <div class="fieldgroup">
            <label for="name">Field Name:</label>
            <input type="text" name="name" id="name" size="20" value="<?php echo $_REQUEST['name']; ?>" />
        </div>

        <div class="fieldgroup">
            <label for="label">Label:</label>
            <input type="text" name="label" id="label" size="60" value="<?php echo $_REQUEST['label']; ?>" />
        </div>

        <div class="fieldgroup">
            <label for="type">Type:</label>
            <select name="type" id="type">
              <?php echo OptionTags($type_options, $_REQUEST['type']); ?>
            </select>
        </div>

        <div class="fieldgroup">
            <label for="tag_attributes">Tag Attributes:</label>
            <input type="text" name="tag_attributes" id="tag_attributes" size="50" value="<?php echo $_REQUEST['tag_attributes']; ?>" />
        </div>

        <div class="fieldgroup">
            <label for="options">Options:</label>
            <input type="text" name="options" id="options" size="70" value="<?php echo $_REQUEST['options']; ?>" />
        </div>

        <div class="fieldgroup">
            <label for="validation">Validation:</label>
            <select name="validation" id="validation">
              <?php echo OptionTags($validation_options, $_REQUEST['validation']); ?>
            </select>
            &nbsp;
            <input type="text" name="validation_extras" id="validation_extras" size="30" value="<?php echo $_REQUEST['validation_extras']; ?>" />
        </div>

        <div class="fieldgroup">
            <label for="validation_message">Validation Error:</label>
            <input type="text" name="validation_message" id="validation_message" size="70" value="<?php echo $_REQUEST['validation_message']; ?>" />
        </div>

        <div class="fieldgroup">
            <label></label>
            <div style="float: left; width: 500px; padding-bottom: 5px;">
            <label for="on_create" class="cblabel"><?php echo CheckBox('on_create', 'checkbox', 1, $_REQUEST['on_create']); ?> Display on account creation form</label>
            <label for="on_edit" class="cblabel"><?php echo CheckBox('on_edit', 'checkbox', 1, $_REQUEST['on_edit']); ?> Display on account editing form</label>
            <label for="required" class="cblabel"><?php echo CheckBox('required', 'checkbox', 1, $_REQUEST['required']); ?> Field is required when adding/editing account</label>
            </div>
        </div>

        </fieldset>

    <div class="centered margin-top">
      <button type="submit"><?php echo ($editing ? 'Update' : 'Add'); ?> Account Field</button>
    </div>

    <input type="hidden" name="field_id" value="<?php echo $_REQUEST['field_id']; ?>" />
    <input type="hidden" name="r" value="<?php echo ($editing ? 'lxEditUserField' : 'lxAddUserField'); ?>">

    <?php if( $editing ): ?>
    <input type="hidden" name="editing" value="1">
    <input type="hidden" name="old_name" value="<?php echo $_REQUEST['old_name']; ?>" />
    <?PHP endif; ?>
    </form>
</div>



</body>
</html>
