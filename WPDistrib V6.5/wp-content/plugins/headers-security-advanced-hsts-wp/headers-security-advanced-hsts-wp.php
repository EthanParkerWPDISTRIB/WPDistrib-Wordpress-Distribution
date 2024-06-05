<?php
/**
 * Plugin Name: Headers Security Advanced & HSTS WP
 * Plugin URI: https://www.tentacleplugins.com/
 * Description: Headers Security Advanced & HSTS WP - Simple, Light and Fast. The plugin uses advanced security rules that provide huge levels of protection and it is important that your site uses it. This step is important to submit your website and/or domain to an approved HSTS list. Google officially compiles this list and it is used by Chrome, Firefox, Opera, Safari, IE11 and Edge. You can forward your site to the official HSTS preload directory. Cross Site Request Forgery (CSRF) is a common attack with the installation of Headers Security Advanced & HSTS WP will help you mitigate CSRF on your WordPress site.
 * Version: 5.0.35
 * Text Domain: headers-security-advanced-hsts-wp
 * Domain Path: /languages
 * Author: 🐙 Andrea Ferro
 * Author URI: https://www.linkedin.com/in/andrea-ferro-55046186/
 *          __
 *      ___( o)>
 *      \ <_. )
 *       `---'   irn3.com
 * ---------------------------------------------------------
 * Headers Security Advanced & HSTS WP plugin for GPL v2
 * ---------------------------------------------------------
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! function_exists( 'add_action' ) ) {
    die( 'Don\'t try to be smart with us, only real ninjas can enter here!' );
}

const HSTS_PLUGIN_VERSION = '5.0.35';
const HSTS_STANDARD_VALUE_CSP = 'upgrade-insecure-requests;';
const HSTS_STANDARD_VALUE_PERMISSIONS_POLICY = 'accelerometer=(), autoplay=(), camera=(), cross-origin-isolated=(), display-capture=(self), encrypted-media=(), fullscreen=*, geolocation=(self), gyroscope=(), keyboard-map=(), magnetometer=(), microphone=(), midi=(), payment=*, picture-in-picture=(), publickey-credentials-get=(), screen-wake-lock=(), sync-xhr=(), usb=(), xr-spatial-tracking=(), gamepad=(), serial=()';

function hsts_plugin_get_headers( array $headers = array() ): array {
    $headers['Access-Control-Allow-Methods']             = 'GET,POST';
    $headers['Access-Control-Allow-Headers']             = 'Content-Type, Authorization';
    $headers['Content-Security-Policy']                  = hsts_plugin_get_csp_header();
    $headers['Cross-Origin-Embedder-Policy']             = "unsafe-none; report-to='default'";
    $headers['Cross-Origin-Embedder-Policy-Report-Only'] = "unsafe-none; report-to='default'";
    $headers['Cross-Origin-Opener-Policy']               = 'unsafe-none';
    $headers['Cross-Origin-Opener-Policy-Report-Only']   = "unsafe-none; report-to='default'";
    $headers['Cross-Origin-Resource-Policy']             = 'cross-origin';
    $headers['Permissions-Policy']                       = hsts_plugin_get_permissions_policy_header();
    $headers['Referrer-Policy']                          = 'strict-origin-when-cross-origin';
    $headers['Strict-Transport-Security']                = hsts_plugin_get_hsts_header();
    $headers['X-Content-Security-Policy']                = 'default-src \'self\'; img-src *; media-src * data:;';
    $headers['X-Content-Type-Options']                   = 'nosniff';
    $headers['X-Frame-Options']                          = hsts_plugin_get_x_frame_options_header();
    $headers['X-Permitted-Cross-Domain-Policies']        = 'none';

    return $headers;
}
add_filter( 'wp_headers', 'hsts_plugin_get_headers' );

function hsts_plugin_settings(): void {
    add_options_page(
        __( 'Headers Security Advanced & HSTS WP', 'headers-security-advanced-hsts-wp' ),
        __( 'Headers Security Advanced & HSTS WP', 'headers-security-advanced-hsts-wp' ),
        'manage_options',
        'headers-security-advanced-hsts-wp-plugin',
        'hsts_plugin_settings_page'
    );
}
add_action( 'admin_menu', 'hsts_plugin_settings' );

function hsts_plugin_add_admin_style(): void {
    wp_register_style( 'hsts-plugin-admin', plugins_url( '/assets/css/style-dist.css', __FILE__ ), array(), HSTS_PLUGIN_VERSION );
    wp_enqueue_style( 'hsts-plugin-admin' );
}
add_action( 'admin_init', 'hsts_plugin_add_admin_style' );

function hsts_plugin_settings_page(): void {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'headers-security-advanced-hsts-wp' ) );
    } ?>
<div class="wrap HeaderSecurityAdvancedHSTSWPROSHUEbkgsuccess">
    <?php
    printf( esc_html__( '%1$sYour website is finally safe! 🚀🚀%2$s Implement enhanced security headers, HSTS preload for optimum website protection.', 'headers-security-advanced-hsts-wp' ), '<strong>', '</strong>' );
    ?>
</div>

<div class="wrap HeaderSecurityAdvancedHSTSWPROSHUEbkgpadw">
    <div class="HeaderSecurityAdvancedHSTSWPROSHUEbub1459bk">
        <div class="HeaderSecurityAdvancedHSTSWPROSHUEbub14591"></div>
        <div class="HeaderSecurityAdvancedHSTSWPROSHUEbub14592"></div>
    </div>

    <h2 class="HeaderSecurityAdvancedHSTSWPROSHUEhero2112">
        <?php esc_html_e( 'Headers Security Advanced & HSTS WP: The security of your website is our priority! 🛸', 'headers-security-advanced-hsts-wp' ); ?>
    </h2>

    <div class="HeaderSecurityAdvancedHSTSWPROSHUEgridgap1546">
        <div class="HeaderSecurityAdvancedHSTSWPROSHUEtxgrh1">
        <?php
            printf( esc_html__( 'The %1$sHeaders Security Advanced & HSTS WP%2$s security plugin for WordPress is an essential and completely free plugin to protect your WordPress site. %1$sHeaders Security Advanced & HSTS WP%2$s adds security headers quickly to your site to protect it from threats such as phishing attacks, data theft and more. %1$sHeaders Security Advanced & HSTS WP%2$s is easy to use and allows you to customize the HSTS Preload header to suit your needs. The plugin is compatible with all major browsers and operating systems and can be installed on any WordPress site.', 'headers-security-advanced-hsts-wp' ), '<b>', '</b>' );
        ?>
        </div>
        <div class="HeaderSecurityAdvancedHSTSWPROSHUEtxgrh1">
            <?php
                printf( esc_html__( 'Please consider buying me a coffee to support my work on this %1$sHeaders Security Advanced & HSTS WP%2$s plugin.', 'headers-security-advanced-hsts-wp' ), '<b>', '</b>' );
            ?>
            <br /><br />
            <table border="0px">
                <tr>
                    <td><a class="HeaderSecurityAdvancedHSTSWPROSHUEbksnack" href="https://www.buymeacoffee.com/tentacleplugins" target="_blank"><?php esc_attr_e( 'Buy me a coffee', 'headers-security-advanced-hsts-wp' ); ?></a></td>
                    <td><a class="HeaderSecurityAdvancedHSTSWPROSHUEbksnack" href="https://www.paypal.com/donate/?hosted_button_id=M72GQUM8CWTZS" target="_blank"><?php esc_attr_e( 'Donate via PayPal', 'headers-security-advanced-hsts-wp' ); ?></a></td>
                </tr>
            </table><br /><?php esc_html_e( 'I create projects available to everyone for free and I like to create simple but functional projects.', 'headers-security-advanced-hsts-wp' ); ?>
        </div>
        <a href="https://wordpress.org/plugins/headers-security-advanced-hsts-wp/" class="HeaderSecurityAdvancedHSTSWPROSHUEbkg">
            <div class="HeaderSecurityAdvancedHSTSWPROSHUErw1">
                <?php
                    printf( esc_html__( '%1$sDo you need help with the Headers Security Advanced & HSTS WP plugin?%2$s Don\'t worry, I\'ve got it covered!', 'headers-security-advanced-hsts-wp' ), '<strong>', '</strong>' );
                ?>
            </div>
        </a>
        <a href="https://forms.gle/d8PYXYaKZJXRQzeh9" class="HeaderSecurityAdvancedHSTSWPROSHUEbkg">
            <div class="HeaderSecurityAdvancedHSTSWPROSHUErw1">
                <?php
                    printf( esc_html__( '%1$sHelp me decide what the next features of this plugin will be!%2$s Take part in a nerdy survey!', 'headers-security-advanced-hsts-wp' ), '<strong>', '</strong>' );
                ?>
            </div>
        </a>
    </div>

    <div class="HeaderSecurityAdvancedHSTSWPROSHUEgrid_settings HeaderSecurityAdvancedHSTSWPROSHUEselspace1128t">
        <h4 class="HeaderSecurityAdvancedHSTSWPROSHUEtboxy1440"><?php esc_html_e( 'Quick selection:', 'headers-security-advanced-hsts-wp' ); ?></h4>
        <div class="HeaderSecurityAdvancedHSTSWPROSHUEselspeed1127 HeaderSecurityAdvancedHSTSWPROSHUEselspace1128">
            <div><span class="HeaderSecurityAdvancedHSTSWPROSHUEbadge1950"><a href="#HSTSPRELOADLISTSUB"><?php esc_html_e( 'Strict Transport Security (HSTS)', 'headers-security-advanced-hsts-wp' ); ?></a></span></div>
        </div>
        <form method="post" action="options.php">
            <?php settings_fields( 'hsts-plugin-settings-group' ); ?>
            <?php do_settings_sections( 'hsts-plugin-settings-group' ); ?>
            <table class="form-table" id="HSTSPRELOADLISTSUB">
                <tr>
                    <th class="HeaderSecurityAdvancedHSTSWPROSHUEcltab1636">
                        <label for="HeaderSecurityAdvancedHSTSWPROSHUErunFieldId">
                            <h4 class="HeaderSecurityAdvancedHSTSWPROSHUEtboxy1348"><?php esc_html_e( 'Max-Age: ', 'headers-security-advanced-hsts-wp' ); ?></h4>
                        </label>
                        <p>
                            <span class="HeaderSecurityAdvancedHSTSWPROSHUEctd3">
                                <?php
                                    esc_html_e(
                                        'The Max-Age parameter specifies the period of time (in seconds) for which the browser should store the HSTS information. During this time period, the browser will always use HTTPS to communicate with the website, even if the visitor has entered "http" or an HTTP link in the address bar. This helps protect the website and its visitors from man-in-the-middle (MITM) attacks and other security threats.',
                                        'headers-security-advanced-hsts-wp',
                                    );
                                ?>
                            </span>
                        </p>
                    </th>
                    <td>
                        <input type="text" name="hsts_max_age" value="<?php echo esc_attr( get_option( 'hsts_max_age' ) ); ?>" />
                        <div class="HeaderSecurityAdvancedHSTSWPROSHUEbox333">
                            <p>
                                <span class="HeaderSecurityAdvancedHSTSWPROSHUEtxexttextSize">
                                    <?php
                                        esc_html_e(
                                            'It is advisable to set "max-age" to a high value, such as a full year (31536000 seconds). This ensures that browsers continue to store security information for a long period of time, which helps protect users from man-in-the-middle attacks. However, it is important to keep in mind that setting the value too high could cause problems if you need to change your site\'s SSL configuration in the future. Therefore, it is important to carefully consider your usage and security needs before setting the value.',
                                            'headers-security-advanced-hsts-wp',
                                        );
                                    ?>
                                </span>
                            </p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="HeaderSecurityAdvancedHSTSWPROSHUEcltab1636">
                        <label for="HeaderSecurityAdvancedHSTSWPROSHUErunFieldId">
                            <h4 class="HeaderSecurityAdvancedHSTSWPROSHUEtboxy1348"><?php esc_html_e( 'Include Subdomains: ', 'headers-security-advanced-hsts-wp' ); ?></h4>
                        </label>
                        <p>
                            <span class="HeaderSecurityAdvancedHSTSWPROSHUEctd3">
                                <?php
                                    esc_html_e(
                                        'The "includeSubDomains" flag specifies that the effect of the header should also be applied to subdomains of the domain. When this directive is present, all requests to any subdomains of your domain are automatically redirected to the HTTPS protocol, providing enhanced security for the website and the users who visit it.',
                                        'headers-security-advanced-hsts-wp',
                                    );
                                ?>
                            </span>
                        </p>
                    </th>
                    <td>
                        <input type="checkbox" name="hsts_include_subdomains" value="1" <?php checked( 1, get_option( 'hsts_include_subdomains' ), true ); ?> />
                        <div class="HeaderSecurityAdvancedHSTSWPROSHUEbox333">
                            <p>
                                <span class="HeaderSecurityAdvancedHSTSWPROSHUEtxexttextSize">
                                    <?php
                                        esc_html_e(
                                            'We recommend enabling the "includeSubDomains" option in the HSTS header to ensure that all subsections of your site (subdomains) are only loaded via HTTPS. However, before enabling this flag, it is important to ensure that all subdomains, resources and web services working under your domain are available via HTTPS and that there are no compatibility issues with any external services used by your site.',
                                            'headers-security-advanced-hsts-wp',
                                        );
                                    ?>
                                </span>
                            </p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="HeaderSecurityAdvancedHSTSWPROSHUEcltab1636">
                        <label for="HeaderSecurityAdvancedHSTSWPROSHUErunFieldId">
                            <h4 class="HeaderSecurityAdvancedHSTSWPROSHUEtboxy1348"><?php esc_html_e( 'Preload: ', 'headers-security-advanced-hsts-wp' ); ?></h4>
                        </label>
                        <p>
                            <span class="HeaderSecurityAdvancedHSTSWPROSHUEctd3">
                                <?php
                                printf(
                                    esc_html__(
                                        'The "preload" flag allows the website to be included in the %1$sHSTS preload list%2$s, which instructs browsers to always use HTTPS connection for the site and its subdomains, without ever making insecure HTTP requests.',
                                        'headers-security-advanced-hsts-wp',
                                    ),
                                    '<a href="https://hstspreload.org/">',
                                    '</a>',
                                );
                                ?>
                            </span>
                        </p>
                    </th>
                    <td>
                        <input type="checkbox" name="hsts_preload" value="1" <?php checked( 1, get_option( 'hsts_preload' ), true ); ?> />
                        <div class="HeaderSecurityAdvancedHSTSWPROSHUEbox333">
                            <p>
                                <span class="HeaderSecurityAdvancedHSTSWPROSHUEtxexttextSize">
                                    <?php
                                    printf(
                                        esc_html__(
                                            'Enabling "preload" further helps prevent any potential man-in-the-middle attacks, thus improving connection security as far as it concerns HSTS. %1$sPlease note%2$s that even if this flag is enabled, your website still needs to be manually submitted to the list. %1$sPlease also note%2$s that inclusion in the preload list has %1$spermanent consequences%2$s and %3$sis not easy to undo%4$s, so you should only enable this flag and submit your website after making sure that all of the resources and services within your domain (and its subdomains, if "includeSubDomains" is also enabled) are indeed accessible and functional via HTTPS.',
                                            'headers-security-advanced-hsts-wp',
                                        ),
                                        '<b>',
                                        '</b>',
                                        '<a href="https://hstspreload.org/#removal">',
                                        '</a>',
                                    );
                                    ?>
                                </span>
                            </p>
                        </div>
                    </td>
                </tr>
               <div class="HeaderSecurityAdvancedHSTSWPROSHUEselspeed1127 HeaderSecurityAdvancedHSTSWPROSHUEselspace1128">
               <div><span class="HeaderSecurityAdvancedHSTSWPROSHUEbadge1950"><a href="#HSTSCSP"><?php esc_html_e( 'Content Security Policy (CSP)', 'headers-security-advanced-hsts-wp' ); ?></a></span></div>
              </div>
                <tr id="HSTSCSP">
                    <th scope="row">
                            <label for="hsts_csp">
                                <h4 class="HeaderSecurityAdvancedHSTSWPROSHUEtboxy1348"><?php esc_html_e('CSP Header Contents', 'headers-security-advanced-hsts-wp'); ?></h4>
                            </label>
                        <p>
                            <span class="HeaderSecurityAdvancedHSTSWPROSHUEctd3">
                                <?php
                                printf(
                                    esc_html__(
                                        'HTTP Content-Security-Policy header controls website resources, reducing XSS risk by specifying allowed server origins and script endpoints.',
                                        'headers-security-advanced-hsts-wp',
                                    ),
                                );
                                ?>
                            </span>
                        </p>
                    </th>
                    <td>
                        <textarea id="hsts_csp" name="hsts_csp" rows="5" cols="50" placeholder="if not customized the value of the plugin is used"><?php echo esc_textarea(get_option('hsts_csp')); ?></textarea>
                    </td>
                </tr>
                <div class="HeaderSecurityAdvancedHSTSWPROSHUEselspeed1127 HeaderSecurityAdvancedHSTSWPROSHUEselspace1128">
               <div><span class="HeaderSecurityAdvancedHSTSWPROSHUEbadge1950"><a href="#HSTSPERMISSIONS"><?php esc_html_e( 'Permissions Policy', 'headers-security-advanced-hsts-wp' ); ?></a></span></div>
              </div>
              <tr id="HSTSPERMISSIONS">
                    <th scope="row">
                            <label for="hsts_pp">
                                <h4 class="HeaderSecurityAdvancedHSTSWPROSHUEtboxy1348"><?php esc_html_e('Permissions Policy Contents', 'headers-security-advanced-hsts-wp'); ?></h4>
                            </label>
                        <p>
                            <span class="HeaderSecurityAdvancedHSTSWPROSHUEctd3">
                                <?php
                                printf(
                                    esc_html__(
                                        'The HTTP Permissions-Policy header provides a mechanism to allow and deny the use of browser features in a document or within any <iframe> elements in the document.',
                                        'headers-security-advanced-hsts-wp',
                                    ),
                                );
                                ?>
                            </span>
                        </p>
                    </th>
                    <td>
                        <textarea id="hsts_pp" name="hsts_pp" rows="5" cols="50" placeholder="if not customized the value of the plugin is used"><?php echo esc_textarea(get_option('hsts_pp')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                             <label for="hsts_pp">
                                <h4 class="HeaderSecurityAdvancedHSTSWPROSHUEtboxy1348"><?php esc_html_e('X-Frame-Options', 'headers-security-advanced-hsts-wp'); ?></h4>
                            </label>
                            <p>
                            <span class="HeaderSecurityAdvancedHSTSWPROSHUEctd3">
                                <?php
                                printf(
                                    esc_html__(
                                        'The X-Frame-Options HTTP response header can be used to indicate whether or not a browser should be allowed to render a page in a <frame>, <iframe>, <embed> or <object>. Sites can use this to avoid click-jacking attacks, by ensuring that their content is not embedded into other sites.',
                                        'headers-security-advanced-hsts-wp',
                                    ),
                                );
                                ?>
                            </span>
                        </p>
                    </th>
                    <td>
                    <select id="hsts_x_frame_options" name="hsts_x_frame_options">
                        <option value="DENY" <?php selected('DENY', get_option('hsts_x_frame_options')); ?>>DENY</option>
                        <option value="SAMEORIGIN" <?php selected('SAMEORIGIN', get_option('hsts_x_frame_options')); ?>>SAMEORIGIN</option>
                        <option value="ALLOW-FROM" <?php selected('ALLOW-FROM', get_option('hsts_x_frame_options')); ?>>ALLOW-FROM</option>
                    </select>
                    <br /><br />
                    <div id="hsts_x_frame_options_url_field" style="display: none;">
                        <input type="text" name="hsts_x_frame_options_allow_from_url" value="<?php echo esc_attr(get_option('hsts_x_frame_options_allow_from_url')); ?>" placeholder="https://example.com">
                    </div>

                    </td>
                </tr>

            </table>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {
                    var selectElement = document.getElementById('hsts_x_frame_options');
                    var urlField = document.getElementById('hsts_x_frame_options_url_field');

                    function toggleUrlField() {
                        if (selectElement.value === 'ALLOW-FROM') {
                            urlField.style.display = '';
                        } else {
                            urlField.style.display = 'none';
                        }
                    }

                    toggleUrlField();

                    selectElement.addEventListener('change', toggleUrlField);
                });
            </script>

            <?php
            submit_button();
            ?>
        </form>
    </div>
</div>
<?php
}
function hsts_plugin_settings_init(): void {
    register_setting( 'hsts-plugin-settings-group', 'hsts_max_age' );
    register_setting( 'hsts-plugin-settings-group', 'hsts_include_subdomains' );
    register_setting( 'hsts-plugin-settings-group', 'hsts_preload' );
    register_setting( 'hsts-plugin-settings-group', 'hsts_csp', 'sanitize_text_field');
    register_setting( 'hsts-plugin-settings-group', 'hsts_pp', 'sanitize_text_field');
    register_setting( 'hsts-plugin-settings-group', 'hsts_x_frame_options');
    register_setting( 'hsts-plugin-settings-group', 'hsts_x_frame_options_allow_from_url');

}
add_action( 'admin_init', 'hsts_plugin_settings_init' );

function hsts_plugin_get_hsts_header(): string {
    $max_age            = get_option( 'hsts_max_age' );
    $include_subdomains = get_option( 'hsts_include_subdomains' );
    $preload            = get_option( 'hsts_preload' );

    $header_tokens = array( "max-age={$max_age}" );
    if ( $include_subdomains ) {
        $header_tokens[] = 'includeSubDomains';
    }
    if ( $preload ) {
        $header_tokens[] = 'preload';
    }

    return implode( '; ', $header_tokens );
}

function hsts_plugin_get_csp_header(): string {
    $csp = get_option('hsts_csp');
    return empty($csp) ? HSTS_STANDARD_VALUE_CSP : $csp;
}

function hsts_plugin_get_permissions_policy_header(): string {
    $pp = get_option('hsts_pp');
    return empty($pp) ? HSTS_STANDARD_VALUE_PERMISSIONS_POLICY : $pp;
}

function hsts_plugin_get_x_frame_options_header(): string {
    $x_frame_options = get_option('hsts_x_frame_options', 'SAMEORIGIN');
    if ($x_frame_options === 'ALLOW-FROM') {
        $allow_from_url = get_option('hsts_x_frame_options_allow_from_url', '');
        if (!empty($allow_from_url)) {
            return "ALLOW-FROM $allow_from_url";
        }
        return "ALLOW-FROM"; 
    }
    return $x_frame_options ?: 'SAMEORIGIN';
}

function hsts_plugin_update_htaccess(): void {
    $filesystem = hsts_plugin_get_filesystem();
    if ( null === $filesystem ) {
        return;
    }

    $htaccess_file = hsts_plugin_get_writable_htaccess_path( $filesystem );
    if ( null === $htaccess_file ) {
        return;
    }

    hsts_plugin_cleanup_htaccess();

    $original_contents = $filesystem->get_contents( $htaccess_file );
    if ( false === $original_contents ) {
        return;
    }

    $lines = array(
        $original_contents,
        '',
        sprintf( '# BEGIN Headers Security Advanced & HSTS WP %s', HSTS_PLUGIN_VERSION ),
        '<IfModule mod_headers.c>',
    );

    foreach ( hsts_plugin_get_headers() as $name => $header ) {
        $lines[] = "Header set {$name} \"{$header}\"";
    }

    $lines[] = '</IfModule>';
    $lines[] = '# END Headers Security Advanced & HSTS WP';
    $lines[] = '';

    $filesystem->put_contents( $htaccess_file, implode( PHP_EOL, $lines ) );
}

function hsts_plugin_activate(): void {
    if ( ! get_option( 'hsts_max_age' ) ) {
        add_option( 'hsts_max_age', '63072000' );
    }
    if ( ! get_option( 'hsts_include_subdomains' ) ) {
        add_option( 'hsts_include_subdomains', '0' );
    }
    if ( ! get_option( 'hsts_preload' ) ) {
        add_option( 'hsts_preload', '0' );
    }
    if ( ! get_option( 'hsts_csp' ) ) {
        add_option( 'hsts_csp', HSTS_STANDARD_VALUE_CSP );
    }
    if ( ! get_option( 'hsts_pp' ) ) {
        add_option( 'hsts_pp', HSTS_STANDARD_VALUE_PERMISSIONS_POLICY );
    }
    if ( ! get_option( 'hsts_x_frame_options' ) ) {
        add_option( 'hsts_x_frame_options', 'SAMEORIGIN' );
    }

    hsts_plugin_update_htaccess();
}
register_activation_hook( __FILE__, 'hsts_plugin_activate' );

function hsts_plugin_cleanup_htaccess(): void {
    $filesystem = hsts_plugin_get_filesystem();
    if ( null === $filesystem ) {
        return;
    }

    $htaccess_file = hsts_plugin_get_writable_htaccess_path( $filesystem );
    if ( null === $htaccess_file ) {
        return;
    }

    $htaccess_contents = $filesystem->get_contents( $htaccess_file );
    if ( false === $htaccess_contents ) {
        return;
    }

    // This regex should match our whole block, both current and older versions.
    $regex             = '/\n*# (BEGIN )?(WordPress )?Headers Security Advanced & HSTS WP (Version |- )?\d+\.\d+\.\d+[^#]+\n# END (WordPress )?Headers Security Advanced & HSTS WP[^\n]*\n*/ism';
    $htaccess_contents = preg_replace( $regex, "\n\n", $htaccess_contents );
    $filesystem->put_contents( $htaccess_file, $htaccess_contents );

    hsts_plugin_flush_rewrite_rules();
}

function hsts_plugin_flush_rewrite_rules(): void {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}

function hsts_plugin_delete_old_options(): void {
    // Last referenced by plugin version 5.0.35.
    delete_option( 'HEADERS_SECURITY_ADVANCED_HSTS_WP_PLUGIN_VERSION' );
}

add_action( 'upgrader_process_complete', 'hsts_plugin_update_htaccess' );
add_action( 'upgrader_process_complete', 'hsts_plugin_delete_old_options' );

add_action( 'update_option_hsts_max_age', 'hsts_plugin_update_htaccess' );
add_action( 'update_option_hsts_include_subdomains', 'hsts_plugin_update_htaccess' );
add_action( 'update_option_hsts_preload', 'hsts_plugin_update_htaccess' );
add_action( 'update_option_hsts_csp', 'hsts_plugin_update_htaccess' );
add_action( 'update_option_hsts_pp', 'hsts_plugin_update_htaccess' );

add_action('update_option_hsts_x_frame_options', 'hsts_plugin_update_htaccess');
add_action('update_option_hsts_x_frame_options_allow_from_url', 'hsts_plugin_update_htaccess');

function hsts_plugin_add_dashboard_widget(): void {
    wp_add_dashboard_widget(
        'wpexplorer_dashboard_widget',
        esc_html__( 'Headers Security Advanced & HSTS WP', 'headers-security-advanced-hsts-wp' ),
        'hsts_plugin_get_dashboard_widget_contents'
    );
}
add_action( 'wp_dashboard_setup', 'hsts_plugin_add_dashboard_widget' );

function hsts_plugin_get_dashboard_widget_contents(): void {
    ?>
        <h2>
            <span style="color:#0f135e;font-weight: 800;"><?php esc_html_e( 'Congratulations, you are safe!', 'headers-security-advanced-hsts-wp' ); ?></span> 🦖
        </h2>
        <p>
            <?php
                printf(
                    esc_html__(
                        '%1$sThe Headers Security Advanced & HSTS WP%2$s project implements HTTP response headers that your site can use to increase the security of your website. The plug-in will automatically set up all Best Practices (you don’t have to think about anything). You will also be able to change the headers simply in the plugin settings.',
                        'headers-security-advanced-hsts-wp',
                    ),
                    '<b>',
                    '</b>',
                );
            ?>
        </p>
        <table border="0px">
            <tr>
                <td>
                    <a class="HeaderSecurityAdvancedHSTSWPROSHUEbksnacka" href="https://www.buymeacoffee.com/tentacleplugins" target="_blank"><?php esc_attr_e( 'Buy me a coffee', 'headers-security-advanced-hsts-wp' ); ?></a>
                </td>
                <td>
                    <a class="HeaderSecurityAdvancedHSTSWPROSHUEbksnacka" href="https://www.paypal.com/donate/?hosted_button_id=M72GQUM8CWTZS" target="_blank"><?php esc_attr_e( 'Donate via PayPal', 'headers-security-advanced-hsts-wp' ); ?></a>
                </td>
            </tr>
        </table>
        <p>
            <span class="SentinelHeadersUnlimitedExtensionSHUEtxextSizeCenter">
                <?php
                    printf(
                        esc_html__(
                            'Security is a right, not a privilege. Plugin version %s.',
                            'headers-security-advanced-hsts-wp',
                        ),
                        esc_html( HSTS_PLUGIN_VERSION ),
                    );
                ?>
            </span>
        </p>
    <?php
}

function hsts_plugin_add_plugin_action_links( array $links, string $file ): array {
    static $this_plugin;

    if ( ! $this_plugin ) {
        $this_plugin = plugin_basename( __FILE__ );
    }

    if ( $file === $this_plugin ) {
        $settings_link = '<a href="https://www.paypal.com/donate/?hosted_button_id=M72GQUM8CWTZS">Donate a coffee</a>';
        array_unshift( $links, $settings_link );
    }
    return $links;
}
add_filter( 'plugin_action_links', 'hsts_plugin_add_plugin_action_links', 10, 2 );

function hsts_plugin_deactivate(): void {
    hsts_plugin_cleanup_htaccess();

    hsts_plugin_delete_old_options();

    delete_option( 'hsts_max_age' );
    delete_option( 'hsts_include_subdomains' );
    delete_option( 'hsts_preload' );
    delete_option( 'hsts_csp' );
    delete_option( 'hsts_pp' );
    delete_option( 'hsts_x_frame_options_url_field' );
    delete_option( 'hsts_x_frame_options' );

}
register_deactivation_hook( __FILE__, 'hsts_plugin_deactivate' );

function hsts_plugin_get_filesystem(): ?WP_Filesystem_Base {
    if ( true !== WP_Filesystem() ) {
        return null;
    }

    global $wp_filesystem;

    return $wp_filesystem;
}

function hsts_plugin_get_writable_htaccess_path( WP_Filesystem_Base $filesystem ): ?string {
    $htaccess_file = get_home_path() . '.htaccess';

    if ( ! $filesystem->exists( $htaccess_file ) || ! $filesystem->is_readable( $htaccess_file ) || ! $filesystem->is_writable( $htaccess_file ) ) {
        return null;
    }

    return $htaccess_file;
}