{!! Form::open(['class' => 'form-horizontal']) !!}
<div class="panel-body" style="display: flex; flex-direction: column; justify-content: center; align-items: center">
    <p>Please enter the new password.</p>

    <div class="section mn">

        <div class="smart-widget sm-right smr-80">
            <label for="email" class="field prepend-icon">
                <input type="password" name="password" id="password" class="gui-input"
                       placeholder="Your new password">
                <label for="password" class="field-icon text-alert">
                    <i class="fa fa-envelope-o"></i>
                </label>
            </label>

            <label for="email" class="button">
                <a href="/get-new-password" >
                    <input type="submit" class="button" value="Reset"></a>
            </label>
        </div>
        <!-- -------------- /Block Widget -------------- -->

    </div>
    <!-- -------------- /section -------------- -->
</div>
<!-- -------------- /Form -------------- -->
{!! Form::close() !!}