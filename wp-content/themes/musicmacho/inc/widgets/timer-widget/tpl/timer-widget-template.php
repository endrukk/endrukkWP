<div class="countdown animated fadeInUp go announcement-content">
    <div class="booking"><?php echo esc_html($instance['musicmacho_title']); ?></div>
    <div class="brandingCounter countdown-timer" id="countdown-timer">
        <div class="counterDay">
            <span class="days"><?php esc_html__('00','musicmacho'); ?></span>
            <div class="timeRefDays"><?php esc_html__('days','musicmacho'); ?></div>
        </div>
        <div class="counterHour">
            <span class="hours"><?php esc_html__('00','musicmacho'); ?></span>
            <div class="timeRefHours"><?php esc_html__('hours','musicmacho'); ?></div>
        </div>
        <div class="counterMinute">
            <span class="minutes"><?php esc_html__('00','musicmacho'); ?></span>
            <div class="timeRefMinutes"><?php esc_html__('minutes','musicmacho'); ?></div>
        </div>
        <div class="counterSecond">
            <span class="seconds"><?php esc_html__('00','musicmacho'); ?></span>
            <div class="timeRefSeconds"><?php esc_html__('seconds','musicmacho'); ?></div>
        </div>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function () {
    var brandingCounterDate = '<?php echo $instance['musicmacho_date_time']; ?>';
    var musicmacho_timezone = '<?php echo $instance['musicmacho_timezone'];  ?>';
    jQuery(".countdown-timer").countdown({
        date: '<?php echo $instance['musicmacho_date_time']; ?> <?php echo $instance['musicmacho_timezone'];  ?>',
        format: "on"
    });
});
</script>