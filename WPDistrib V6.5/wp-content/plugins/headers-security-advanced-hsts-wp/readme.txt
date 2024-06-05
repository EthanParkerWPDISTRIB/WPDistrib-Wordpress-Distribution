=== Headers Security Advanced & HSTS WP ===
Contributors: unicorn03, unicorn07, erku, alexclassroom,
Donate link: https://www.buymeacoffee.com/tentacleplugins
Tags: headers security, hsts, headers, clickjacking, csp
Requires at least: 4.7
Tested up to: 6.4
Stable tag: 5.0.35
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Best all-in-one WordPress security plugin, uses HTTP & HSTS response headers to avoid vulnerabilities: XSS, injection, clickjacking. Force HTTP/HTTPS.

== Description ==

= ENGLISH =

**Headers Security Advanced & HSTS WP** is Best all-in-one a free plug-in for all WordPress users. Deactivating this plugin will return your site configuration exactly to the state it was in before.

The **Headers Security Advanced & HSTS WP** project implements HTTP response headers that your site can use to increase the security of your website. The plug-in will automatically set up all Best Practices (you don't have to think about anything), these HTTP response headers can prevent modern browsers from running into easily predictable vulnerabilities. The Headers Security Advanced & HSTS WP project wants to popularize and increase awareness and usage of these headers for all wordpress users.

This plugin is developed by TentaclePlugins by irn3, we care about WordPress security and best practices.

Check out the best features of **Headers Security Advanced & HSTS WP:**

  * HSA Limit Login to block brute force attacks.
  * X-XSS-Protection (non-standard)
  * Expect-CT
  * Access-Control-Allow-Origin
  * Access-Control-Allow-Methods
  * Access-Control-Allow-Headers
  * X-Content-Security-Policy
  * X-Content-Type-Options
  * X-Frame-Options
  * X-Permitted-Cross-Domain-Policies
  * X-Powered-By
  * Content-Security-Policy
  * Referrer-Policy
  * HTTP Strict Transport Security / HSTS
  * Content-Security-Policy
  * Clear-Site-Data
  * Cross-Origin-Embedder-Policy-Report-Only
  * Cross-Origin-Opener-Policy-Report-Only
  * Cross-Origin-Embedder-Policy
  * Cross-Origin-Opener-Policy
  * Cross-Origin-Resource-Policy
  * Permissions-Policy
  * Strict-dynamic
  * Strict-Transport-Security
  * FLoC (Federated Learning of Cohorts)

**Headers Security Advanced & HSTS WP** is based on **OWASP CSRF** to protect your wordpress site. Using OWASP CSRF, once the plugin is installed, it will provide full CSRF mitigation without having to call a method to use nonce on the output. The site will be secure despite having other vulnerable plugins (CSRF).

HTTP security headers are a critical part of your website's security. After automatic implementation with Headers Security Advanced & HSTS WP, they protect you from the most notorious types of attacks your site might encounter. These headers protect against XSS, code injection, clickjacking, etc.

We have put a lot of effort into making the most important services operational with **Content Security Policy (CSP)**, below are some examples that we have tested and used with **Headers Security Advanced & HSTS WP**:

  * CSP usage for **Google Tag Manager**
    world's most popular tag manager
  * Using CSP for **Gravatar**
    Avatar service for WordPress and Social sites
  * Using CSP for **Wordpress Internal Media**
    support Wordpress media
  * Using CSP for **Youtube Embedded Video SDK**
    support Youtube embedded frames and JS SDK
  * CSP usage for **CookieLaw**
    privacy technology to meet regulatory requirements
  * CSP usage for **Mailchimp**
    support for Mailchimp automation, SDK and modules
  * CSP usage for **Google Analytics**
    support for basic conversion domains such as: stats.g.doubleclick.net and www.google.com
  * CSP usage for **Google Fonts**
    you're not loading it on the page, chances are one of your SDKs is using it
  * Using CSP for **Facebook
    support Facebook SDK functionality
  * Using CSP for **Stripe**
    highly secure online payment system
  * Using CSP for **New Relic**
    it's a registration and monitoring utility
  * Using CSP for **Linkedin Tags + SDKs**
    support Linkedin Insight, Linkedin Ads and SDK
  * Using CSP for **OneTrust**
    OneTrust support helps companies manage privacy requirements
  * CSP usage for **Moat**
    Moat support to measurement suite such as: ad verification, brand safety, advertising and coverage
  * CSP usage for **jQuery**
    support of jQuery - JS library
  * CSP usage for **Twitter Widgets & SDKs**
    support Connect, Widgets and the Twitter client-side SDK
  * Using CSP for **Google Maps**
    support Google Maps as The ggpht used by streetview
  * Using CSP for **Quantcast Choice**
    Quantcast support for privacy such as GDPR and CCPA
  * CSP usage for **Twitter Ads & Analytics**
    Twitter support for advertising and Analytics
  * Using CSP for **Paypal**
    PayPal support for online payment system
  * Using CSP for **Drift**
    Drift and Driftt support
  * CSP usage for **Cookiebot**
    cookie and tracker support, GDPR/ePrivacy and CCPA compliance
  * CSP usage for **Vimeo Embedded Videos SDK**
    support frames, JS SDK, Froogaloop integration
  * Using CSP for **AppNexus (now Xandr)**
    AppNexus support for custom retargeting
  * Using CSP for **Mixpanel**
    support analytics tool with SDK/JS to collect client-side data
  * Using CSP for **Font Awesome**
    toolkit support for fonts and icons over CSS and Less
  * Using CSP for **Google reCAPTCHA**
    reCAPTCHA support for fraud and bot protection
  * CSP usage for **Bootstrap** CDN
    Bootstrap support for CSS frameworks
  * Using CSP for **HubSpot**
    Hubspot support with many features, used for monitoring and mkt functionality
  * Using CSP for **Hotjar**
    Hotjar tracker support for analytics and metrics
  * Using CSP for **WP.com**
    support for wp.com hosting
  * Using CSP for **Akamai mPulse**
    support for Akamai mPulse, for origin and perimeter integrations
  * CSP usage for **Cloudflare - Rocket-Loader & Mirage**
    support for Mirage libraries for performance acceleration
  * Using CSP for **Cloudflare - CDN.js**
    Cloudflare's open CDN support with multiple libraries
  * Using CSP for **jsDelivr**
    support jsDelivr free CDN for Open Source
    
**Headers Security Advanced & HSTS WP** is based on the OWASP CSRF standard to protect your wordpress site. Using the OWASP CSRF standard, once the plugin is installed, you can customize CSP rules for full CSRF mitigation. The site will be secure despite having other vulnerable plugins (CSRF).

**All Free Features**
The **Headers Security Advanced & HSTS WP** version includes all the free features.

We have implemented **FLoC (Federated Learning of Cohorts)**, using best practices. First, using **Headers Security Advanced & HSTS WP** prevents the browser from including your site in the "cohort calculation" on **FLoC (Federated Learning of Cohorts)**. This means that nothing can call document.interestCohort() to get the FLoC ID of the currently used client. Obviously, this does nothing outside of your currently visited site and does not "disable" FLoC on the client beyond that scope.

Even though **FLoC** is still fairly new and not yet widely supported, as programmers we think that privacy protection elements are important, so we choose to give you the feature of being opt out of FLoC! We’ve created a special **“automatic blocking of FLoC”** feature, trying to always **offer the best tool with privacy protection and cyber security** as main targets and focus.

Analyze your site before and after using *Headers Security Advanced & HSTS WP* security headers are self-configured according to HTTP Security Headers and HTTP Strict Transport Security / HSTS best practices.

* Check HTTP Security Headers on <a href="https://securityheaders.com/" target="_blank">securityheaders.com</a> 
* Check HTTP Strict Transport Security / HSTS at <a href="https://hstspreload.org/" target="_blank">hstspreload.org</a>
* Check WebPageTest at <a href="https://www.webpagetest.org/" target="_blank">webpagetest.org</a>
* Check HSTS test website <a href="https://gf.dev/hsts-test/" target="_blank">gf.dev/hsts-test</a>
* Check CSP test website <a href="https://csper.io/evaluator" target="_blank">csper.io/evaluator</a>
* Check CSP Evaluator <a href="https://csp-evaluator.withgoogle.com/" target="_blank">csp-evaluator.withgoogle.com</a>
* CSP Content Security Policy Generator <a href="https://addons.mozilla.org/en-US/firefox/addon/content-security-policy-gen/" target="_blank">addons.mozilla.org</a>

This plugin is updated periodically, our limited support is free, we are available for your feedback (bugs, compatibility issues or recommendations for next updates). We are usually fast :-D.

== Frequently Asked Questions ==

= How do you get an A+ grade? =

To earn an A+ grade, your site must issue all HTTP response headers that we check. This indicates a high level of commitment to improving the security of your visitors.

= What headers are recommended? =

Over an HTTP connection we get Content-Security-Policy, X-Content-Type-Options, X-Frame-Options and X-XSS-Protection. Via an HTTPS connection, 2 additional headers are checked for presence which are Strict-Transport-Security and Public-Key-Pins.

* Once the plug-in is activated it performs a test (before and after): <a href="https://securityheaders.com/" target="_blank">https://securityheaders.com/</a>

= Can the plugin create slowdowns? =

No, Headers Security Advanced & HSTS WP is Fast, Secure and does not affect the SEO and speed of your website.

= What is HSTS (Strict Transport Security)? =

It was created as a solution to force the browser to use secure connections when a site is running on HTTPS. It is a security header that is added to the web server and reflected in the response header as Strict-Transport-Security. HSTS is important because it addresses the following anomalies:

= Check before and after using Preload HSTS =

This step is important to submit your website and/or domain to an approved HSTS list. Google officially compiles this list and it is used by Chrome, Firefox, Opera, Safari, IE11 and Edge. You can forward your site to the official HSTS preload directory. ('https://hstspreload.org/')

= how to use HTTP Strict Transport Security (HSTS) =

If you want to use Preload HSTS for your site, there are a few requirements before you can activate it.

* Have a valid SSL certificate. You can't do any of this anyway without it.
* You must redirect all HTTP traffic to HTTPS (recommended via permanent 301 redirects). This means that your site should be HTTPS only.
* You need to serve all subdomains in HTTPS as well. If you have subdomains, you will need an SSL certificate.

The HSTS header on your base domain (for example: example.com) is already configured you just need to activate the plug-in.

If you want to check the HSTS status of your site, you can do so here: <a href="https://hstspreload.org/" target="_blank">https://hstspreload.org/</a>

= Can I report a bug or request a feature? =

You can report bugs or request new features right <a href="mailto:support@tentacleplugins.com">support@tentacleplugins[dot]com</a>

= Disable FLoC, Google's advertising technology =

FLoC is a mega tracker that monitors user activity on all sites, stores the information in the browser, and then uses machine learning to place users into cohorts with similar interests. This way, advertisers can target groups of people with similar interests. Plus, according to Google's own testing, FLoC achieves at least 95% more conversions than cookies.

= Who is disabling FLoC by Google? =

Scott Helme reported that as of May 3, already 967 of the first 1 million domains had disabled FLoC's interest-cohort in their Permissions-Policy header. That list included some big sites like The Guardian and IKEA.

= Do you use CloudFlare and the Headers Security Advanced & HSTS WP plugin? =

Are you experiencing any anomalies after a plugin update? If yes, please follow these instructions: clear the cache directly to the CloudFlare Client Area

* Log in to your Cloudflare dashboard, and select your account and domain.
* Select Caching > Configuration.
* Under Cache Purge, select Custom Purge. The custom purge window will be displayed.
* Under Purge by, select URL.
* Enter the appropriate values in the text field using the format shown in the example.
* Run through the additional instructions to complete the form.
* Review the data entered.
* Click Delete.

This will cause the <a href="https://developers.cloudflare.com/cache/how-to/purge-cache/" target="_blank">cloudFlare</a>

== Installation ==

= ITALIAN =

1. Vai in Plugin 'Aggiungi nuovo'.
2. Cerca Headers Security Advanced & HSTS WP.
3. Cerca questo plugin, scaricalo e attivalo.
4. Vai in 'impostazioni' > 'Headers Security Advanced & HSTS WP'. Per personalizzare le intestazioni.
5. Puoi cambiare questa opzione quando vuoi, Headers Security Advanced & HSTS WP viene impostato in automatico.

= ENGLISH =

1. Go to Plugins 'Add New'.
2. Search for Headers Security Advanced & HSTS WP.
3. Search for this plugin, download and activate it.
4. Go to 'settings' > 'Headers Security Advanced & HSTS WP'. To customize headers.
5. You can change this option whenever you want, Headers Security Advanced & HSTS WP is set automatically.

= FRANÇAIS =

1. Allez dans Plugins 'Add new'.
2. Recherchez Headers Security Advanced & HSTS WP.
3. Recherchez ce plugin, téléchargez-le et activez-le.
4. Allez dans 'settings' > 'Headers Security Advanced & HSTS WP'. Pour personnaliser les en-têtes
5. Vous pouvez modifier cette option quand vous le souhaitez, Headers Security Advanced & HSTS WP est réglé automatiquement.

= DEUTSCH =

1. Gehen Sie zu Plugins 'Neu hinzufügen'.
2. Suchen Sie nach Headers Security Advanced & HSTS WP.
3. Suchen Sie nach diesem Plugin, laden Sie es herunter und aktivieren Sie es.
4. Gehen Sie zu "Einstellungen" > "Kopfzeilen Sicherheit Erweitert & HSTS WP". So passen Sie die Kopfzeilen an
5. Sie können diese Option jederzeit ändern, Headers Security Advanced & HSTS WP wird automatisch eingestellt.

== Screenshots ==

1. Check HTTP Security Headers (AFTER)
2. Check HTTP Security Headers (BEFORE)
3. Check HTTP Strict Transport Security / HSTS (list)
4. Check WebPageTest (AFTER)
5. Check WebPageTest (BEFORE)
6. Setting on single site installation
7. Check HTTP Security Headers - Serpworx (AFTER)
8. Check HTTP Security Headers - Serpworx (BEFORE)
9. Site-wide security setting

== Changelog ==

= 5.0.35 =
We don't want to tell you what to do, but here's the point: if you've updated the Headers Security Advanced & HSTS WP plugin last time, you've seen that when we suggest doing so, we don't just say it and leave it at that. Well, with this 5.0.35 version we've added and fixed a lot (we got rid of some bugs, tidied up some pesky pixels and updated the graphics) and it all works great. Are we agreed? Touch "update" and we'll provide you with the most beautiful, fastest, and most impressive plugin around. Enjoy!
- Fixed: Fixed the bug that could delete the plugin rules of the header customization function (X-Frame-Options and Permissions-Policy), this was caused by the customization of ALLOW-FROM Fixed the bug that could delete the plugin rules of the header customization function (X-Frame-Options and Permissions-Policy), this was caused by the customization of ALLOW-FROM
- Delete: deleted the 'X-XSS-Protection' header because this functionality is no longer in the standards path.