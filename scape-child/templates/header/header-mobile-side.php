<?php
$header_style = wtbx_option_levelled('header-style');
if ( !empty(wtbx_option_sub('h'.$header_style.'-mobile-breakpoint', 'width')) || !empty(wtbx_option_sub('h'.$header_style.'-mobile-breakpoint', 'height')) ) {
    $header_style = 'm';
    $sections   = wtbx_option_sub('h'.$header_style.'-builder', 'value');
    $sections   = $sections !== '' ? json_decode($sections, true) : '';
    $header_design = wtbx_option('hm-design');
    if ( empty($header_design) ) { $header_design = 'default'; }
    ?>

    <div class="wtbx_mobile_backdrop"></div>
    <nav id="mobile-header" class="header-mobile-side wtbx_skin_<?php echo esc_attr(wtbx_option('hm-side-skin')); ?> wtbx_design_<?php echo esc_attr($header_design); ?>" data-width="<?php echo esc_attr(wtbx_option('hm-s-width')); ?>">
        <div class="mobile-nav-wrapper">
            <div class="mobile-nav-header">
                <div class="wtbx_mobile_close"></div>

                    <div class="mobile-icons">
                        <a href="<?php echo $link_url ; ?>login" class="btn btn--icon">
                        <span class="icon">
                        <svg width="26" height="30" viewBox="0 0 26 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.8684 17.5244C16.2331 17.5244 15.4468 18.4468 12.7632 18.4468C10.0795 18.4468 9.29887 17.5244 7.6579 17.5244C3.4301 17.5244 0 20.9947 0 25.2721V26.7478C0 28.2754 1.22504 29.5148 2.73496 29.5148H22.7914C24.3013 29.5148 25.5263 28.2754 25.5263 26.7478V25.2721C25.5263 20.9947 22.0962 17.5244 17.8684 17.5244ZM22.7914 26.7478H2.73496V25.2721C2.73496 22.5281 4.94572 20.2914 7.6579 20.2914C8.48978 20.2914 9.84017 21.2138 12.7632 21.2138C15.7089 21.2138 17.0308 20.2914 17.8684 20.2914C20.5806 20.2914 22.7914 22.5281 22.7914 25.2721V26.7478ZM12.7632 16.6021C17.2929 16.6021 20.9681 12.8839 20.9681 8.30104C20.9681 3.71817 17.2929 0 12.7632 0C8.23338 0 4.55827 3.71817 4.55827 8.30104C4.55827 12.8839 8.23338 16.6021 12.7632 16.6021ZM12.7632 2.76701C15.7773 2.76701 18.2331 5.25156 18.2331 8.30104C18.2331 11.3505 15.7773 13.8351 12.7632 13.8351C9.749 13.8351 7.29324 11.3505 7.29324 8.30104C7.29324 5.25156 9.749 2.76701 12.7632 2.76701Z" fill="#6B6B6B"></path>
                        </svg>
                        </span>
                        <p class="btn--icon__label">Login</p>
                        </a>


                        <a href="<?php echo $link_url ; ?>cart" class="btn btn--icon">
                        <span class="icon">
                        <svg width="29" height="32" viewBox="0 0 29 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.9137 14.4681V7.54137C19.9137 6.07171 19.3254 4.66224 18.2782 3.62303C17.231 2.58382 15.8107 2 14.3298 2C12.8488 2 11.4286 2.58382 10.3814 3.62303C9.33419 4.66224 8.74589 6.07171 8.74589 7.54137V14.4681M3.23322 11.5866C3.26129 11.2394 3.4201 10.9155 3.67802 10.6793C3.93594 10.4431 4.27405 10.312 4.625 10.3121H24.0346C24.3855 10.312 24.7236 10.4431 24.9816 10.6793C25.2395 10.9155 25.3983 11.2394 25.4264 11.5866L26.6506 26.7145C26.6815 27.0958 26.6324 27.4792 26.5066 27.8407C26.3808 28.2022 26.1809 28.534 25.9196 28.8151C25.6582 29.0961 25.3411 29.3205 24.9881 29.474C24.6351 29.6275 24.2539 29.7068 23.8685 29.7069H4.79112C4.40572 29.7068 4.02452 29.6275 3.67152 29.474C3.31852 29.3205 3.00136 29.0961 2.74001 28.8151C2.47867 28.534 2.27879 28.2022 2.15297 27.8407C2.02715 27.4792 1.97812 27.0958 2.00895 26.7145L3.23182 11.5866H3.23322Z" stroke="#6B6B6B" stroke-width="2.79194" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        </span>
                        <p class="btn--icon__label">
                        Cart
                        </p>
                        </a>
                    </div>


            </div>


            <?php
            if ( $sections !== '' && is_array($sections) ) {
                foreach ($sections as $section => $areas) {
                    if ( $section === 'header' || $section === 'main' || $section === 'footer' ) { ?>
                        <div class="wtbx_hs wtbx_hs_<?php echo esc_attr($section); ?>">
                            <div class="wtbx_hs_inner clearfix"><?php
                                foreach ($areas as $area => $items) { ?>
                                    <div class="wtbx_ha wtbx_ha_<?php echo esc_attr($section); ?>_<?php echo esc_attr($area); ?> clearfix"><?php
                                        foreach ($items as $item => $props) {
                                            include(locate_template('templates/header/parts/' . $props['id'] . '.php'));
                                        }
                                        ?></div>
                                <?php }
                                ?></div>
                        </div>
                    <?php }
                }
            }
            ?>
        </div>
    </nav>

<?php } ?>