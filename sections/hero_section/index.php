<?php
$hero = get_sub_field('home_hero_section') ?: [];
$title = $hero['section_hero_title'] ?: 'Default title';
 
?>

<section class="section-hero">
    <div class="section-overlay"
        style="background-image:url(<?php echo esc_url( get_template_directory_uri())?>/assets/images/GRID.png)"></div>
    <div class="section-overlay-ornament-top"></div>
    <div class="section-overlay-ornament-left"></div>
    <div class="section-overlay-ornament-right"></div>
    <div class="shell">
        <div class="section-inner">
            <h1 class="section-title">
                <strong>
                    <span>
                        We
                    </span>
                </strong>
                <strong>
                    <i
                        style="background-image:url(<?php echo esc_url( get_template_directory_uri())?>/assets/images/SYMBOL.png)"></i>
                    <span>
                        are
                    </span>

                    <small>
                        Supporting clients to sustainably eliminate 3Gt of CO2e on their transition to Net Zero
                    </small>
                </strong>
                <strong>
                    <strong>
                        <em>
                            Activators
                        </em>
                    </strong>
                </strong>
            </h1>

            <p class="mobile-content">
             
                    <i
                        style="background-image:url(<?php echo esc_url( get_template_directory_uri())?>/assets/images/SYMBOL.png)"></i>


                    <span>
                        Supporting clients to sustainably eliminate 3Gt of CO2e on their transition to Net Zero
                    </span>
                
            </p>

            <p class="text-right">
                <a href="#" class="btn"> Explore Net Zero</a>
            </p>
        </div>
    </div>
</section>