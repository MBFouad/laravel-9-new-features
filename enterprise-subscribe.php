<?php

$form_style = 'modern';
if ($style) {
    $form_style = $style;
} else {
    $form_style = 'default';
}
?>

<?php if (ICL_LANGUAGE_CODE == 'en'): ?>
    <!-- MailChimp Form -->
    <form data-enable-shim="true"
          action="//inktankcommunications.us9.list-manage.com/subscribe/post?u=3f7bc576715ca1a70edef2788&amp;id=464dd6285c"
          class="form-modern" method="post" onsubmit="return valthis()">
        <div class="row">
            <div class="<?= ($fullWidth) ? 'col-xs-12' : 'col-md-6 col-md-push-6' ?>">
                <?php include( locate_template( 'forms/_checkbox-subscribe-form.php' ) ); ?>
            </div>

            <div class="<?= ($fullWidth) ? 'col-xs-12' : 'col-md-6 col-md-pull-6' ?>">
                <?php include( locate_template( 'forms/_inputs-subscribe-form.php' ) ); ?>

                <div class="form-group">
                    <button type="submit"
                            class="btn btn-primary btn-block btn-lg"><?php _e('Subscribe', 'enterprise') ?></button>
                </div>
            </div>
        </div>
    </form>

<?php elseif (ICL_LANGUAGE_CODE == 'ar'): ?>

    <form data-enable-shim="true"
          action="//inktankcommunications.us9.list-manage.com/subscribe/post?u=3f7bc576715ca1a70edef2788&amp;id=8f9fc2d6d0"
          class="form-modern-ar" method="post" onsubmit="return valthis()">
        <div class="row">
            <div class="<?= ($fullWidth) ? 'col-xs-12' : 'col-md-6 col-md-push-6' ?>">
                <?php include( locate_template( 'forms/_checkbox-subscribe-form.php' ) ); ?>

            </div>

            <div class="<?= ($fullWidth) ? 'col-xs-12' : 'col-md-6 col-md-pull-6' ?>">
                <?php include( locate_template( 'forms/_inputs-subscribe-form.php' ) ); ?>
                <div class="form-group">
                    <button type="submit"
                            class="btn btn-primary btn-block btn-lg"><?php _e('Subscribe', 'enterprise') ?></button>
                </div>
            </div>
        </div>

    </form>

<?php endif; ?>

<!-- Form validation script -->
<script>
    var checkbox = jQuery("input.input--checkbox");
    var countChecked = 3;

    jQuery.each(checkbox, function (i, el) {
        el.addEventListener('change', function () {
            if (this.checked) {
                countChecked++;
                if (countChecked >= 1) {
                    jQuery(".checkbox-error").removeClass("show");
                }
            } else {
                countChecked--;
                if (countChecked <= 0) {
                    jQuery(".checkbox-error").addClass("show");
                }
            }
        });
    })

    function valthis() {
        if (countChecked <= 0) {
            return false;
        }
    }
</script>

<!-- In case of using campaign monitor insteadof Mailshimp use the below form -->
<!-- Campaign Monitor Form -->
<!--    <form data-enable-shim="true" action="https://inktankcommunications.createsend.com/t/i/s/alydru/" class="form-<?php // echo $form_style ?>" method="post">
        <div class="form-group">
            <div class="input">
                <label for="fieldName"><?php _e('Full Name (Required)', 'enterprise') ?></label>
                <input type="name" name="cm-name" class="form-control" id="fieldName" data-validation="custom" data-validation-regexp="^(\w+\s+\w+\s*)+|([\u0600-\u06FF]+\s+[\u0600-\u06FF]+\s*)+$" data-validation-error-msg="Please enter your first and last name"/>
            </div>
        </div>

        <div class="form-group">
            <div class="input">
                <label for="fieldEmail"><?php _e('Email (Required)', 'enterprise') ?></label>
                <input type="email" name="cm-alydru-alydru" class="form-control" id="fieldEmail" data-validation="custom" data-validation-regexp='^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' data-validation-error-msg="Please provide a valid email address"/>
            </div>
        </div>

        <div class="form-group">
            <div class="input">
                <label for="fieldqjkw"><?php _e('Company / Affiliation', 'enterprise') ?></label>
                <input type="text" name="cm-f-ydbhij" class="form-control" id="fieldqjkw" data-validation="required" data-validation-error-msg="Please provide your company/affiliation"/>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg"><?php _e('Subscribe', 'enterprise') ?></button>
        </div>
    </form> -->
