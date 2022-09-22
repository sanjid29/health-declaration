@extends('projects.health-declaration.layouts.pdf-print.template')
<style type="text/css">
    /*!
 * Bootstrap v3.3.6 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 *//*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css */
    html {font-family: sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%}
    body {margin: 0}
    article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {display: block}
    audio, canvas, progress, video {display: inline-block;vertical-align: baseline}
    audio:not([controls]) {display: none;height: 0}
    [hidden], template {display: none}
    a {background-color: transparent}
    a:active, a:hover {outline: 0}
    abbr[title] {border-bottom: 1px dotted}
    b, strong {font-weight: 700}
    dfn {font-style: italic}
    h1 {margin: .67em 0;font-size: 2em}
    mark {color: #000;background: #ff0}
    small {font-size: 80%}
    sub, sup {position: relative;font-size: 75%;line-height: 0;vertical-align: baseline}
    sup {top: -.5em}
    sub {bottom: -.25em}
    img {border: 0}
    svg:not(:root) {overflow: hidden}
    figure {margin: 1em 40px}
    hr {height: 0;-webkit-box-sizing: content-box;-moz-box-sizing: content-box;box-sizing: content-box}
    pre {overflow: auto}
    code, kbd, pre, samp {font-family: monospace, monospace;font-size: 1em}
    button, input, optgroup, select, textarea {margin: 0;font: inherit;color: inherit}
    button {overflow: visible}
    button, select {text-transform: none}
    button, html input[type=button], input[type=reset], input[type=submit] {-webkit-appearance: button;cursor: pointer}
    button[disabled], html input[disabled] {cursor: default}
    button::-moz-focus-inner, input::-moz-focus-inner {padding: 0;border: 0}
    input {line-height: normal}
    input[type=checkbox], input[type=radio] {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 0}
    input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button {height: auto}
    input[type=search] {-webkit-box-sizing: content-box;-moz-box-sizing: content-box;box-sizing: content-box;-webkit-appearance: textfield}
    input[type=search]::-webkit-search-cancel-button, input[type=search]::-webkit-search-decoration {-webkit-appearance: none}
    fieldset {padding: .35em .625em .75em;margin: 0 2px;border: 1px solid silver}
    legend {padding: 0;border: 0}
    textarea {overflow: auto}
    optgroup {font-weight: 700}
    table {border-spacing: 0;border-collapse: collapse}
    td, th {padding: 0}
    /*! Source: https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */
    @media print {
        *, :after, :before {color: #000 !important;text-shadow: none !important;background: 0 0 !important;-webkit-box-shadow: none !important;box-shadow: none !important}
        a, a:visited {text-decoration: underline}
        a[href]:after {content: " (" attr(href) ")"}
        abbr[title]:after {content: " (" attr(title) ")"}
        a[href^="javascript:"]:after, a[href^="#"]:after {content: ""}
        blockquote, pre {border: 1px solid #999;page-break-inside: avoid}
        thead {display: table-header-group}
        img, tr {page-break-inside: avoid}
        img {max-width: 100% !important}
        h2, h3, p {orphans: 3;widows: 3}
        h2, h3 {page-break-after: avoid}
        .navbar {display: none}
        .btn > .caret, .dropup > .btn > .caret {border-top-color: #000 !important}
        .label {border: 1px solid #000}
        .table {border-collapse: collapse !important}
        .table td, .table th {background-color: #fff !important}
        .table-bordered td, .table-bordered th {border: 1px solid #ddd !important}
    }
    @font-face {
        font-family: 'Glyphicons Halflings';
        src: url(../fonts/glyphicons-halflings-regular.eot);
        src: url(../fonts/glyphicons-halflings-regular.eot?#iefix) format('embedded-opentype'), url(../fonts/glyphicons-halflings-regular.woff2) format('woff2'), url(../fonts/glyphicons-halflings-regular.woff) format('woff'), url(../fonts/glyphicons-halflings-regular.ttf) format('truetype'), url(../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular) format('svg')
    }
    @font-face {
        font-family: "solaiman-lipi";
        src: url("fonts/solaiman-lipi.ttf");
    }

    .glyphicon {position: relative;top: 1px;display: inline-block;font-family: 'Glyphicons Halflings';font-style: normal;font-weight: 400;line-height: 1;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale}
    .glyphicon-asterisk:before {content: "\002a"}
    .glyphicon-plus:before {content: "\002b"}
    .glyphicon-eur:before, .glyphicon-euro:before {content: "\20ac"}
    .glyphicon-minus:before {content: "\2212"}
    .glyphicon-cloud:before {content: "\2601"}
    .glyphicon-envelope:before {content: "\2709"}
    .glyphicon-pencil:before {content: "\270f"}
    .glyphicon-glass:before {content: "\e001"}
    .glyphicon-music:before {content: "\e002"}
    .glyphicon-search:before {content: "\e003"}
    .glyphicon-heart:before {content: "\e005"}
    .glyphicon-star:before {content: "\e006"}
    .glyphicon-star-empty:before {content: "\e007"}
    .glyphicon-user:before {content: "\e008"}
    .glyphicon-film:before {content: "\e009"}
    .glyphicon-th-large:before {content: "\e010"}
    .glyphicon-th:before {content: "\e011"}
    .glyphicon-th-list:before {content: "\e012"}
    .glyphicon-ok:before {content: "\e013"}
    .glyphicon-remove:before {content: "\e014"}
    .glyphicon-zoom-in:before {content: "\e015"}
    .glyphicon-zoom-out:before {content: "\e016"}
    .glyphicon-off:before {content: "\e017"}
    .glyphicon-signal:before {content: "\e018"}
    .glyphicon-cog:before {content: "\e019"}
    .glyphicon-trash:before {content: "\e020"}
    .glyphicon-home:before {content: "\e021"}
    .glyphicon-file:before {content: "\e022"}
    .glyphicon-time:before {content: "\e023"}
    .glyphicon-road:before {content: "\e024"}
    .glyphicon-download-alt:before {content: "\e025"}
    .glyphicon-download:before {content: "\e026"}
    .glyphicon-upload:before {content: "\e027"}
    .glyphicon-inbox:before {content: "\e028"}
    .glyphicon-play-circle:before {content: "\e029"}
    .glyphicon-repeat:before {content: "\e030"}
    .glyphicon-refresh:before {content: "\e031"}
    .glyphicon-list-alt:before {content: "\e032"}
    .glyphicon-lock:before {content: "\e033"}
    .glyphicon-flag:before {content: "\e034"}
    .glyphicon-headphones:before {content: "\e035"}
    .glyphicon-volume-off:before {content: "\e036"}
    .glyphicon-volume-down:before {content: "\e037"}
    .glyphicon-volume-up:before {content: "\e038"}
    .glyphicon-qrcode:before {content: "\e039"}
    .glyphicon-barcode:before {content: "\e040"}
    .glyphicon-tag:before {content: "\e041"}
    .glyphicon-tags:before {content: "\e042"}
    .glyphicon-book:before {content: "\e043"}
    .glyphicon-bookmark:before {content: "\e044"}
    .glyphicon-print:before {content: "\e045"}
    .glyphicon-camera:before {content: "\e046"}
    .glyphicon-font:before {content: "\e047"}
    .glyphicon-bold:before {content: "\e048"}
    .glyphicon-italic:before {content: "\e049"}
    .glyphicon-text-height:before {content: "\e050"}
    .glyphicon-text-width:before {content: "\e051"}
    .glyphicon-align-left:before {content: "\e052"}
    .glyphicon-align-center:before {content: "\e053"}
    .glyphicon-align-right:before {content: "\e054"}
    .glyphicon-align-justify:before {content: "\e055"}
    .glyphicon-list:before {content: "\e056"}
    .glyphicon-indent-left:before {content: "\e057"}
    .glyphicon-indent-right:before {content: "\e058"}
    .glyphicon-facetime-video:before {content: "\e059"}
    .glyphicon-picture:before {content: "\e060"}
    .glyphicon-map-marker:before {content: "\e062"}
    .glyphicon-adjust:before {content: "\e063"}
    .glyphicon-tint:before {content: "\e064"}
    .glyphicon-edit:before {content: "\e065"}
    .glyphicon-share:before {content: "\e066"}
    .glyphicon-check:before {content: "\e067"}
    .glyphicon-move:before {content: "\e068"}
    .glyphicon-step-backward:before {content: "\e069"}
    .glyphicon-fast-backward:before {content: "\e070"}
    .glyphicon-backward:before {content: "\e071"}
    .glyphicon-play:before {content: "\e072"}
    .glyphicon-pause:before {content: "\e073"}
    .glyphicon-stop:before {content: "\e074"}
    .glyphicon-forward:before {content: "\e075"}
    .glyphicon-fast-forward:before {content: "\e076"}
    .glyphicon-step-forward:before {content: "\e077"}
    .glyphicon-eject:before {content: "\e078"}
    .glyphicon-chevron-left:before {content: "\e079"}
    .glyphicon-chevron-right:before {content: "\e080"}
    .glyphicon-plus-sign:before {content: "\e081"}
    .glyphicon-minus-sign:before {content: "\e082"}
    .glyphicon-remove-sign:before {content: "\e083"}
    .glyphicon-ok-sign:before {content: "\e084"}
    .glyphicon-question-sign:before {content: "\e085"}
    .glyphicon-info-sign:before {content: "\e086"}
    .glyphicon-screenshot:before {content: "\e087"}
    .glyphicon-remove-circle:before {content: "\e088"}
    .glyphicon-ok-circle:before {content: "\e089"}
    .glyphicon-ban-circle:before {content: "\e090"}
    .glyphicon-arrow-left:before {content: "\e091"}
    .glyphicon-arrow-right:before {content: "\e092"}
    .glyphicon-arrow-up:before {content: "\e093"}
    .glyphicon-arrow-down:before {content: "\e094"}
    .glyphicon-share-alt:before {content: "\e095"}
    .glyphicon-resize-full:before {content: "\e096"}
    .glyphicon-resize-small:before {content: "\e097"}
    .glyphicon-exclamation-sign:before {content: "\e101"}
    .glyphicon-gift:before {content: "\e102"}
    .glyphicon-leaf:before {content: "\e103"}
    .glyphicon-fire:before {content: "\e104"}
    .glyphicon-eye-open:before {content: "\e105"}
    .glyphicon-eye-close:before {content: "\e106"}
    .glyphicon-warning-sign:before {content: "\e107"}
    .glyphicon-plane:before {content: "\e108"}
    .glyphicon-calendar:before {content: "\e109"}
    .glyphicon-random:before {content: "\e110"}
    .glyphicon-comment:before {content: "\e111"}
    .glyphicon-magnet:before {content: "\e112"}
    .glyphicon-chevron-up:before {content: "\e113"}
    .glyphicon-chevron-down:before {content: "\e114"}
    .glyphicon-retweet:before {content: "\e115"}
    .glyphicon-shopping-cart:before {content: "\e116"}
    .glyphicon-folder-close:before {content: "\e117"}
    .glyphicon-folder-open:before {content: "\e118"}
    .glyphicon-resize-vertical:before {content: "\e119"}
    .glyphicon-resize-horizontal:before {content: "\e120"}
    .glyphicon-hdd:before {content: "\e121"}
    .glyphicon-bullhorn:before {content: "\e122"}
    .glyphicon-bell:before {content: "\e123"}
    .glyphicon-certificate:before {content: "\e124"}
    .glyphicon-thumbs-up:before {content: "\e125"}
    .glyphicon-thumbs-down:before {content: "\e126"}
    .glyphicon-hand-right:before {content: "\e127"}
    .glyphicon-hand-left:before {content: "\e128"}
    .glyphicon-hand-up:before {content: "\e129"}
    .glyphicon-hand-down:before {content: "\e130"}
    .glyphicon-circle-arrow-right:before {content: "\e131"}
    .glyphicon-circle-arrow-left:before {content: "\e132"}
    .glyphicon-circle-arrow-up:before {content: "\e133"}
    .glyphicon-circle-arrow-down:before {content: "\e134"}
    .glyphicon-globe:before {content: "\e135"}
    .glyphicon-wrench:before {content: "\e136"}
    .glyphicon-tasks:before {content: "\e137"}
    .glyphicon-filter:before {content: "\e138"}
    .glyphicon-briefcase:before {content: "\e139"}
    .glyphicon-fullscreen:before {content: "\e140"}
    .glyphicon-dashboard:before {content: "\e141"}
    .glyphicon-paperclip:before {content: "\e142"}
    .glyphicon-heart-empty:before {content: "\e143"}
    .glyphicon-link:before {content: "\e144"}
    .glyphicon-phone:before {content: "\e145"}
    .glyphicon-pushpin:before {content: "\e146"}
    .glyphicon-usd:before {content: "\e148"}
    .glyphicon-gbp:before {content: "\e149"}
    .glyphicon-sort:before {content: "\e150"}
    .glyphicon-sort-by-alphabet:before {content: "\e151"}
    .glyphicon-sort-by-alphabet-alt:before {content: "\e152"}
    .glyphicon-sort-by-order:before {content: "\e153"}
    .glyphicon-sort-by-order-alt:before {content: "\e154"}
    .glyphicon-sort-by-attributes:before {content: "\e155"}
    .glyphicon-sort-by-attributes-alt:before {content: "\e156"}
    .glyphicon-unchecked:before {content: "\e157"}
    .glyphicon-expand:before {content: "\e158"}
    .glyphicon-collapse-down:before {content: "\e159"}
    .glyphicon-collapse-up:before {content: "\e160"}
    .glyphicon-log-in:before {content: "\e161"}
    .glyphicon-flash:before {content: "\e162"}
    .glyphicon-log-out:before {content: "\e163"}
    .glyphicon-new-window:before {content: "\e164"}
    .glyphicon-record:before {content: "\e165"}
    .glyphicon-save:before {content: "\e166"}
    .glyphicon-open:before {content: "\e167"}
    .glyphicon-saved:before {content: "\e168"}
    .glyphicon-import:before {content: "\e169"}
    .glyphicon-export:before {content: "\e170"}
    .glyphicon-send:before {content: "\e171"}
    .glyphicon-floppy-disk:before {content: "\e172"}
    .glyphicon-floppy-saved:before {content: "\e173"}
    .glyphicon-floppy-remove:before {content: "\e174"}
    .glyphicon-floppy-save:before {content: "\e175"}
    .glyphicon-floppy-open:before {content: "\e176"}
    .glyphicon-credit-card:before {content: "\e177"}
    .glyphicon-transfer:before {content: "\e178"}
    .glyphicon-cutlery:before {content: "\e179"}
    .glyphicon-header:before {content: "\e180"}
    .glyphicon-compressed:before {content: "\e181"}
    .glyphicon-earphone:before {content: "\e182"}
    .glyphicon-phone-alt:before {content: "\e183"}
    .glyphicon-tower:before {content: "\e184"}
    .glyphicon-stats:before {content: "\e185"}
    .glyphicon-sd-video:before {content: "\e186"}
    .glyphicon-hd-video:before {content: "\e187"}
    .glyphicon-subtitles:before {content: "\e188"}
    .glyphicon-sound-stereo:before {content: "\e189"}
    .glyphicon-sound-dolby:before {content: "\e190"}
    .glyphicon-sound-5-1:before {content: "\e191"}
    .glyphicon-sound-6-1:before {content: "\e192"}
    .glyphicon-sound-7-1:before {content: "\e193"}
    .glyphicon-copyright-mark:before {content: "\e194"}
    .glyphicon-registration-mark:before {content: "\e195"}
    .glyphicon-cloud-download:before {content: "\e197"}
    .glyphicon-cloud-upload:before {content: "\e198"}
    .glyphicon-tree-conifer:before {content: "\e199"}
    .glyphicon-tree-deciduous:before {content: "\e200"}
    .glyphicon-cd:before {content: "\e201"}
    .glyphicon-save-file:before {content: "\e202"}
    .glyphicon-open-file:before {content: "\e203"}
    .glyphicon-level-up:before {content: "\e204"}
    .glyphicon-copy:before {content: "\e205"}
    .glyphicon-paste:before {content: "\e206"}
    .glyphicon-alert:before {content: "\e209"}
    .glyphicon-equalizer:before {content: "\e210"}
    .glyphicon-king:before {content: "\e211"}
    .glyphicon-queen:before {content: "\e212"}
    .glyphicon-pawn:before {content: "\e213"}
    .glyphicon-bishop:before {content: "\e214"}
    .glyphicon-knight:before {content: "\e215"}
    .glyphicon-baby-formula:before {content: "\e216"}
    .glyphicon-tent:before {content: "\26fa"}
    .glyphicon-blackboard:before {content: "\e218"}
    .glyphicon-bed:before {content: "\e219"}
    .glyphicon-apple:before {content: "\f8ff"}
    .glyphicon-erase:before {content: "\e221"}
    .glyphicon-hourglass:before {content: "\231b"}
    .glyphicon-lamp:before {content: "\e223"}
    .glyphicon-duplicate:before {content: "\e224"}
    .glyphicon-piggy-bank:before {content: "\e225"}
    .glyphicon-scissors:before {content: "\e226"}
    .glyphicon-bitcoin:before {content: "\e227"}
    .glyphicon-btc:before {content: "\e227"}
    .glyphicon-xbt:before {content: "\e227"}
    .glyphicon-yen:before {content: "\00a5"}
    .glyphicon-jpy:before {content: "\00a5"}
    .glyphicon-ruble:before {content: "\20bd"}
    .glyphicon-rub:before {content: "\20bd"}
    .glyphicon-scale:before {content: "\e230"}
    .glyphicon-ice-lolly:before {content: "\e231"}
    .glyphicon-ice-lolly-tasted:before {content: "\e232"}
    .glyphicon-education:before {content: "\e233"}
    .glyphicon-option-horizontal:before {content: "\e234"}
    .glyphicon-option-vertical:before {content: "\e235"}
    .glyphicon-menu-hamburger:before {content: "\e236"}
    .glyphicon-modal-window:before {content: "\e237"}
    .glyphicon-oil:before {content: "\e238"}
    .glyphicon-grain:before {content: "\e239"}
    .glyphicon-sunglasses:before {content: "\e240"}
    .glyphicon-text-size:before {content: "\e241"}
    .glyphicon-text-color:before {content: "\e242"}
    .glyphicon-text-background:before {content: "\e243"}
    .glyphicon-object-align-top:before {content: "\e244"}
    .glyphicon-object-align-bottom:before {content: "\e245"}
    .glyphicon-object-align-horizontal:before {content: "\e246"}
    .glyphicon-object-align-left:before {content: "\e247"}
    .glyphicon-object-align-vertical:before {content: "\e248"}
    .glyphicon-object-align-right:before {content: "\e249"}
    .glyphicon-triangle-right:before {content: "\e250"}
    .glyphicon-triangle-left:before {content: "\e251"}
    .glyphicon-triangle-bottom:before {content: "\e252"}
    .glyphicon-triangle-top:before {content: "\e253"}
    .glyphicon-console:before {content: "\e254"}
    .glyphicon-superscript:before {content: "\e255"}
    .glyphicon-subscript:before {content: "\e256"}
    .glyphicon-menu-left:before {content: "\e257"}
    .glyphicon-menu-right:before {content: "\e258"}
    .glyphicon-menu-down:before {content: "\e259"}
    .glyphicon-menu-up:before {content: "\e260"}
    * {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box}
    :after, :before {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box}
    html {font-size: 10px;-webkit-tap-highlight-color: rgba(0, 0, 0, 0)}
    body {font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size: 14px;line-height: 1.42857143;color: #333;background-color: #fff}
    button, input, select, textarea {font-family: inherit;font-size: inherit;line-height: inherit}
    a {color: #337ab7;text-decoration: none}
    a:focus, a:hover {color: #23527c;text-decoration: underline}
    a:focus {outline: thin dotted;outline: 5px auto -webkit-focus-ring-color;outline-offset: -2px}
    figure {margin: 0}
    img {vertical-align: middle}
    .carousel-inner > .item > a > img, .carousel-inner > .item > img, .img-responsive, .thumbnail a > img, .thumbnail > img {display: block;max-width: 100%;height: auto}
    .img-rounded {border-radius: 6px}
    .img-thumbnail {display: inline-block;max-width: 100%;height: auto;padding: 4px;line-height: 1.42857143;background-color: #fff;border: 1px solid #ddd;border-radius: 4px;-webkit-transition: all .2s ease-in-out;-o-transition: all .2s ease-in-out;transition: all .2s ease-in-out}
    .img-circle {border-radius: 50%}
    hr {margin-top: 20px;margin-bottom: 20px;border: 0;border-top: 1px solid #eee}
    .sr-only {position: absolute;width: 1px;height: 1px;padding: 0;margin: -1px;overflow: hidden;clip: rect(0, 0, 0, 0);border: 0}
    .sr-only-focusable:active, .sr-only-focusable:focus {position: static;width: auto;height: auto;margin: 0;overflow: visible;clip: auto}
    [role=button] {cursor: pointer}
    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {font-family: inherit;font-weight: 500;line-height: 1.1;color: inherit}
    .h1 .small, .h1 small, .h2 .small, .h2 small, .h3 .small, .h3 small, .h4 .small, .h4 small, .h5 .small, .h5 small, .h6 .small, .h6 small, h1 .small, h1 small, h2 .small, h2 small, h3 .small, h3 small, h4 .small, h4 small, h5 .small, h5 small, h6 .small, h6 small {font-weight: 400;line-height: 1;color: #777}
    .h1, .h2, .h3, h1, h2, h3 {margin-top: 20px;margin-bottom: 10px}
    .h1 .small, .h1 small, .h2 .small, .h2 small, .h3 .small, .h3 small, h1 .small, h1 small, h2 .small, h2 small, h3 .small, h3 small {font-size: 65%}
    .h4, .h5, .h6, h4, h5, h6 {margin-top: 10px;margin-bottom: 10px}
    .h4 .small, .h4 small, .h5 .small, .h5 small, .h6 .small, .h6 small, h4 .small, h4 small, h5 .small, h5 small, h6 .small, h6 small {font-size: 75%}
    .h1, h1 {font-size: 36px}
    .h2, h2 {font-size: 30px}
    .h3, h3 {font-size: 24px}
    .h4, h4 {font-size: 18px}
    .h5, h5 {font-size: 14px}
    .h6, h6 {font-size: 12px}
    p {margin: 0 0 10px}
    .lead {margin-bottom: 20px;font-size: 16px;font-weight: 300;line-height: 1.4}
    @media (min-width: 768px) {
        .lead {font-size: 21px}
    }
    .small, small {font-size: 85%}
    .mark, mark {padding: .2em;background-color: #fcf8e3}
    .text-left {text-align: left}
    .text-right {text-align: right}
    .text-center {text-align: center}
    .text-justify {text-align: justify}
    .text-nowrap {white-space: nowrap}
    .text-lowercase {text-transform: lowercase}
    .text-uppercase {text-transform: uppercase}
    .text-capitalize {text-transform: capitalize}
    .text-muted {color: #777}
    .text-primary {color: #337ab7}
    a.text-primary:focus, a.text-primary:hover {color: #286090}
    .text-success {color: #3c763d}
    a.text-success:focus, a.text-success:hover {color: #2b542c}
    .text-info {color: #31708f}
    a.text-info:focus, a.text-info:hover {color: #245269}
    .text-warning {color: #8a6d3b}
    a.text-warning:focus, a.text-warning:hover {color: #66512c}
    .text-danger {color: #a94442}
    a.text-danger:focus, a.text-danger:hover {color: #843534}
    .bg-primary {color: #fff;background-color: #337ab7}
    a.bg-primary:focus, a.bg-primary:hover {background-color: #286090}
    .bg-success {background-color: #dff0d8}
    a.bg-success:focus, a.bg-success:hover {background-color: #c1e2b3}
    .bg-info {background-color: #d9edf7}
    a.bg-info:focus, a.bg-info:hover {background-color: #afd9ee}
    .bg-warning {background-color: #fcf8e3}
    a.bg-warning:focus, a.bg-warning:hover {background-color: #f7ecb5}
    .bg-danger {background-color: #f2dede}
    a.bg-danger:focus, a.bg-danger:hover {background-color: #e4b9b9}
    .page-header {padding-bottom: 9px;margin: 40px 0 20px;border-bottom: 1px solid #eee}
    ol, ul {margin-top: 0;margin-bottom: 10px}
    ol ol, ol ul, ul ol, ul ul {margin-bottom: 0}
    .list-unstyled {padding-left: 0;list-style: none}
    .list-inline {padding-left: 0;margin-left: -5px;list-style: none}
    .list-inline > li {display: inline-block;padding-right: 5px;padding-left: 5px}
    dl {margin-top: 0;margin-bottom: 20px}
    dd, dt {line-height: 1.42857143}
    dt {font-weight: 700}
    dd {margin-left: 0}
    @media (min-width: 768px) {
        .dl-horizontal dt {float: left;width: 160px;overflow: hidden;clear: left;text-align: right;text-overflow: ellipsis;white-space: nowrap}
        .dl-horizontal dd {margin-left: 180px}
    }
    abbr[data-original-title], abbr[title] {cursor: help;border-bottom: 1px dotted #777}
    .initialism {font-size: 90%;text-transform: uppercase}
    blockquote {padding: 10px 20px;margin: 0 0 20px;font-size: 17.5px;border-left: 5px solid #eee}
    blockquote ol:last-child, blockquote p:last-child, blockquote ul:last-child {margin-bottom: 0}
    blockquote .small, blockquote footer, blockquote small {display: block;font-size: 80%;line-height: 1.42857143;color: #777}
    blockquote .small:before, blockquote footer:before, blockquote small:before {content: '\2014 \00A0'}
    .blockquote-reverse, blockquote.pull-right {padding-right: 15px;padding-left: 0;text-align: right;border-right: 5px solid #eee;border-left: 0}
    .blockquote-reverse .small:before, .blockquote-reverse footer:before, .blockquote-reverse small:before, blockquote.pull-right .small:before, blockquote.pull-right footer:before, blockquote.pull-right small:before {content: ''}
    .blockquote-reverse .small:after, .blockquote-reverse footer:after, .blockquote-reverse small:after, blockquote.pull-right .small:after, blockquote.pull-right footer:after, blockquote.pull-right small:after {content: '\00A0 \2014'}
    address {margin-bottom: 20px;font-style: normal;line-height: 1.42857143}
    code, kbd, pre, samp {font-family: Menlo, Monaco, Consolas, "Courier New", monospace}
    code {padding: 2px 4px;font-size: 90%;color: #c7254e;background-color: #f9f2f4;border-radius: 4px}
    kbd {padding: 2px 4px;font-size: 90%;color: #fff;background-color: #333;border-radius: 3px;-webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25);box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25)}
    kbd kbd {padding: 0;font-size: 100%;font-weight: 700;-webkit-box-shadow: none;box-shadow: none}
    pre {display: block;padding: 9.5px;margin: 0 0 10px;font-size: 13px;line-height: 1.42857143;color: #333;word-break: break-all;word-wrap: break-word;background-color: #f5f5f5;border: 1px solid #ccc;border-radius: 4px}
    pre code {padding: 0;font-size: inherit;color: inherit;white-space: pre-wrap;background-color: transparent;border-radius: 0}
    .pre-scrollable {max-height: 340px;overflow-y: scroll}
    .container {padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto}
    @media (min-width: 768px) {
        .container {width: 750px}
    }
    @media (min-width: 992px) {
        .container {width: 970px}
    }
    @media (min-width: 1200px) {
        .container {width: 1170px}
    }
    .container-fluid {padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto}
    .row {margin-right: -15px;margin-left: -15px}
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px}
    .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {float: left}
    .col-xs-12 {width: 100%}
    .col-xs-11 {width: 91.66666667%}
    .col-xs-10 {width: 83.33333333%}
    .col-xs-9 {width: 75%}
    .col-xs-8 {width: 66.66666667%}
    .col-xs-7 {width: 58.33333333%}
    .col-xs-6 {width: 50%}
    .col-xs-5 {width: 41.66666667%}
    .col-xs-4 {width: 33.33333333%}
    .col-xs-3 {width: 25%}
    .col-xs-2 {width: 16.66666667%}
    .col-xs-1 {width: 8.33333333%}
    .col-xs-pull-12 {right: 100%}
    .col-xs-pull-11 {right: 91.66666667%}
    .col-xs-pull-10 {right: 83.33333333%}
    .col-xs-pull-9 {right: 75%}
    .col-xs-pull-8 {right: 66.66666667%}
    .col-xs-pull-7 {right: 58.33333333%}
    .col-xs-pull-6 {right: 50%}
    .col-xs-pull-5 {right: 41.66666667%}
    .col-xs-pull-4 {right: 33.33333333%}
    .col-xs-pull-3 {right: 25%}
    .col-xs-pull-2 {right: 16.66666667%}
    .col-xs-pull-1 {right: 8.33333333%}
    .col-xs-pull-0 {right: auto}
    .col-xs-push-12 {left: 100%}
    .col-xs-push-11 {left: 91.66666667%}
    .col-xs-push-10 {left: 83.33333333%}
    .col-xs-push-9 {left: 75%}
    .col-xs-push-8 {left: 66.66666667%}
    .col-xs-push-7 {left: 58.33333333%}
    .col-xs-push-6 {left: 50%}
    .col-xs-push-5 {left: 41.66666667%}
    .col-xs-push-4 {left: 33.33333333%}
    .col-xs-push-3 {left: 25%}
    .col-xs-push-2 {left: 16.66666667%}
    .col-xs-push-1 {left: 8.33333333%}
    .col-xs-push-0 {left: auto}
    .col-xs-offset-12 {margin-left: 100%}
    .col-xs-offset-11 {margin-left: 91.66666667%}
    .col-xs-offset-10 {margin-left: 83.33333333%}
    .col-xs-offset-9 {margin-left: 75%}
    .col-xs-offset-8 {margin-left: 66.66666667%}
    .col-xs-offset-7 {margin-left: 58.33333333%}
    .col-xs-offset-6 {margin-left: 50%}
    .col-xs-offset-5 {margin-left: 41.66666667%}
    .col-xs-offset-4 {margin-left: 33.33333333%}
    .col-xs-offset-3 {margin-left: 25%}
    .col-xs-offset-2 {margin-left: 16.66666667%}
    .col-xs-offset-1 {margin-left: 8.33333333%}
    .col-xs-offset-0 {margin-left: 0}
    @media (min-width: 768px) {
        .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {float: left}
        .col-sm-12 {width: 100%}
        .col-sm-11 {width: 91.66666667%}
        .col-sm-10 {width: 83.33333333%}
        .col-sm-9 {width: 75%}
        .col-sm-8 {width: 66.66666667%}
        .col-sm-7 {width: 58.33333333%}
        .col-sm-6 {width: 50%}
        .col-sm-5 {width: 41.66666667%}
        .col-sm-4 {width: 33.33333333%}
        .col-sm-3 {width: 25%}
        .col-sm-2 {width: 16.66666667%}
        .col-sm-1 {width: 8.33333333%}
        .col-sm-pull-12 {right: 100%}
        .col-sm-pull-11 {right: 91.66666667%}
        .col-sm-pull-10 {right: 83.33333333%}
        .col-sm-pull-9 {right: 75%}
        .col-sm-pull-8 {right: 66.66666667%}
        .col-sm-pull-7 {right: 58.33333333%}
        .col-sm-pull-6 {right: 50%}
        .col-sm-pull-5 {right: 41.66666667%}
        .col-sm-pull-4 {right: 33.33333333%}
        .col-sm-pull-3 {right: 25%}
        .col-sm-pull-2 {right: 16.66666667%}
        .col-sm-pull-1 {right: 8.33333333%}
        .col-sm-pull-0 {right: auto}
        .col-sm-push-12 {left: 100%}
        .col-sm-push-11 {left: 91.66666667%}
        .col-sm-push-10 {left: 83.33333333%}
        .col-sm-push-9 {left: 75%}
        .col-sm-push-8 {left: 66.66666667%}
        .col-sm-push-7 {left: 58.33333333%}
        .col-sm-push-6 {left: 50%}
        .col-sm-push-5 {left: 41.66666667%}
        .col-sm-push-4 {left: 33.33333333%}
        .col-sm-push-3 {left: 25%}
        .col-sm-push-2 {left: 16.66666667%}
        .col-sm-push-1 {left: 8.33333333%}
        .col-sm-push-0 {left: auto}
        .col-sm-offset-12 {margin-left: 100%}
        .col-sm-offset-11 {margin-left: 91.66666667%}
        .col-sm-offset-10 {margin-left: 83.33333333%}
        .col-sm-offset-9 {margin-left: 75%}
        .col-sm-offset-8 {margin-left: 66.66666667%}
        .col-sm-offset-7 {margin-left: 58.33333333%}
        .col-sm-offset-6 {margin-left: 50%}
        .col-sm-offset-5 {margin-left: 41.66666667%}
        .col-sm-offset-4 {margin-left: 33.33333333%}
        .col-sm-offset-3 {margin-left: 25%}
        .col-sm-offset-2 {margin-left: 16.66666667%}
        .col-sm-offset-1 {margin-left: 8.33333333%}
        .col-sm-offset-0 {margin-left: 0}
    }
    @media (min-width: 992px) {
        .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {float: left}
        .col-md-12 {width: 100%}
        .col-md-11 {width: 91.66666667%}
        .col-md-10 {width: 83.33333333%}
        .col-md-9 {width: 75%}
        .col-md-8 {width: 66.66666667%}
        .col-md-7 {width: 58.33333333%}
        .col-md-6 {width: 50%}
        .col-md-5 {width: 41.66666667%}
        .col-md-4 {width: 33.33333333%}
        .col-md-3 {width: 25%}
        .col-md-2 {width: 16.66666667%}
        .col-md-1 {width: 8.33333333%}
        .col-md-pull-12 {right: 100%}
        .col-md-pull-11 {right: 91.66666667%}
        .col-md-pull-10 {right: 83.33333333%}
        .col-md-pull-9 {right: 75%}
        .col-md-pull-8 {right: 66.66666667%}
        .col-md-pull-7 {right: 58.33333333%}
        .col-md-pull-6 {right: 50%}
        .col-md-pull-5 {right: 41.66666667%}
        .col-md-pull-4 {right: 33.33333333%}
        .col-md-pull-3 {right: 25%}
        .col-md-pull-2 {right: 16.66666667%}
        .col-md-pull-1 {right: 8.33333333%}
        .col-md-pull-0 {right: auto}
        .col-md-push-12 {left: 100%}
        .col-md-push-11 {left: 91.66666667%}
        .col-md-push-10 {left: 83.33333333%}
        .col-md-push-9 {left: 75%}
        .col-md-push-8 {left: 66.66666667%}
        .col-md-push-7 {left: 58.33333333%}
        .col-md-push-6 {left: 50%}
        .col-md-push-5 {left: 41.66666667%}
        .col-md-push-4 {left: 33.33333333%}
        .col-md-push-3 {left: 25%}
        .col-md-push-2 {left: 16.66666667%}
        .col-md-push-1 {left: 8.33333333%}
        .col-md-push-0 {left: auto}
        .col-md-offset-12 {margin-left: 100%}
        .col-md-offset-11 {margin-left: 91.66666667%}
        .col-md-offset-10 {margin-left: 83.33333333%}
        .col-md-offset-9 {margin-left: 75%}
        .col-md-offset-8 {margin-left: 66.66666667%}
        .col-md-offset-7 {margin-left: 58.33333333%}
        .col-md-offset-6 {margin-left: 50%}
        .col-md-offset-5 {margin-left: 41.66666667%}
        .col-md-offset-4 {margin-left: 33.33333333%}
        .col-md-offset-3 {margin-left: 25%}
        .col-md-offset-2 {margin-left: 16.66666667%}
        .col-md-offset-1 {margin-left: 8.33333333%}
        .col-md-offset-0 {margin-left: 0}
    }
    @media (min-width: 1200px) {
        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9 {float: left}
        .col-lg-12 {width: 100%}
        .col-lg-11 {width: 91.66666667%}
        .col-lg-10 {width: 83.33333333%}
        .col-lg-9 {width: 75%}
        .col-lg-8 {width: 66.66666667%}
        .col-lg-7 {width: 58.33333333%}
        .col-lg-6 {width: 50%}
        .col-lg-5 {width: 41.66666667%}
        .col-lg-4 {width: 33.33333333%}
        .col-lg-3 {width: 25%}
        .col-lg-2 {width: 16.66666667%}
        .col-lg-1 {width: 8.33333333%}
        .col-lg-pull-12 {right: 100%}
        .col-lg-pull-11 {right: 91.66666667%}
        .col-lg-pull-10 {right: 83.33333333%}
        .col-lg-pull-9 {right: 75%}
        .col-lg-pull-8 {right: 66.66666667%}
        .col-lg-pull-7 {right: 58.33333333%}
        .col-lg-pull-6 {right: 50%}
        .col-lg-pull-5 {right: 41.66666667%}
        .col-lg-pull-4 {right: 33.33333333%}
        .col-lg-pull-3 {right: 25%}
        .col-lg-pull-2 {right: 16.66666667%}
        .col-lg-pull-1 {right: 8.33333333%}
        .col-lg-pull-0 {right: auto}
        .col-lg-push-12 {left: 100%}
        .col-lg-push-11 {left: 91.66666667%}
        .col-lg-push-10 {left: 83.33333333%}
        .col-lg-push-9 {left: 75%}
        .col-lg-push-8 {left: 66.66666667%}
        .col-lg-push-7 {left: 58.33333333%}
        .col-lg-push-6 {left: 50%}
        .col-lg-push-5 {left: 41.66666667%}
        .col-lg-push-4 {left: 33.33333333%}
        .col-lg-push-3 {left: 25%}
        .col-lg-push-2 {left: 16.66666667%}
        .col-lg-push-1 {left: 8.33333333%}
        .col-lg-push-0 {left: auto}
        .col-lg-offset-12 {margin-left: 100%}
        .col-lg-offset-11 {margin-left: 91.66666667%}
        .col-lg-offset-10 {margin-left: 83.33333333%}
        .col-lg-offset-9 {margin-left: 75%}
        .col-lg-offset-8 {margin-left: 66.66666667%}
        .col-lg-offset-7 {margin-left: 58.33333333%}
        .col-lg-offset-6 {margin-left: 50%}
        .col-lg-offset-5 {margin-left: 41.66666667%}
        .col-lg-offset-4 {margin-left: 33.33333333%}
        .col-lg-offset-3 {margin-left: 25%}
        .col-lg-offset-2 {margin-left: 16.66666667%}
        .col-lg-offset-1 {margin-left: 8.33333333%}
        .col-lg-offset-0 {margin-left: 0}
    }
    table {background-color: transparent}
    caption {padding-top: 8px;padding-bottom: 8px;color: #777;text-align: left}
    th {text-align: left}
    .table {width: 100%;max-width: 100%;margin-bottom: 20px}
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd}
    .table > thead > tr > th {vertical-align: bottom;border-bottom: 2px solid #ddd}
    .table > caption + thead > tr:first-child > td, .table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > td, .table > thead:first-child > tr:first-child > th {border-top: 0}
    .table > tbody + tbody {border-top: 2px solid #ddd}
    .table .table {background-color: #fff}
    .table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th {padding: 5px}
    .table-bordered {border: 1px solid #ddd}
    .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {border: 1px solid #ddd}
    .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {border-bottom-width: 2px}
    .table-striped > tbody > tr:nth-of-type(odd) {background-color: #f9f9f9}
    .table-hover > tbody > tr:hover {background-color: #f5f5f5}
    table col[class*=col-] {position: static;display: table-column;float: none}
    table td[class*=col-], table th[class*=col-] {position: static;display: table-cell;float: none}
    .table > tbody > tr.active > td, .table > tbody > tr.active > th, .table > tbody > tr > td.active, .table > tbody > tr > th.active, .table > tfoot > tr.active > td, .table > tfoot > tr.active > th, .table > tfoot > tr > td.active, .table > tfoot > tr > th.active, .table > thead > tr.active > td, .table > thead > tr.active > th, .table > thead > tr > td.active, .table > thead > tr > th.active {background-color: #f5f5f5}
    .table-hover > tbody > tr.active:hover > td, .table-hover > tbody > tr.active:hover > th, .table-hover > tbody > tr:hover > .active, .table-hover > tbody > tr > td.active:hover, .table-hover > tbody > tr > th.active:hover {background-color: #e8e8e8}
    .table > tbody > tr.success > td, .table > tbody > tr.success > th, .table > tbody > tr > td.success, .table > tbody > tr > th.success, .table > tfoot > tr.success > td, .table > tfoot > tr.success > th, .table > tfoot > tr > td.success, .table > tfoot > tr > th.success, .table > thead > tr.success > td, .table > thead > tr.success > th, .table > thead > tr > td.success, .table > thead > tr > th.success {background-color: #dff0d8}
    .table-hover > tbody > tr.success:hover > td, .table-hover > tbody > tr.success:hover > th, .table-hover > tbody > tr:hover > .success, .table-hover > tbody > tr > td.success:hover, .table-hover > tbody > tr > th.success:hover {background-color: #d0e9c6}
    .table > tbody > tr.info > td, .table > tbody > tr.info > th, .table > tbody > tr > td.info, .table > tbody > tr > th.info, .table > tfoot > tr.info > td, .table > tfoot > tr.info > th, .table > tfoot > tr > td.info, .table > tfoot > tr > th.info, .table > thead > tr.info > td, .table > thead > tr.info > th, .table > thead > tr > td.info, .table > thead > tr > th.info {background-color: #d9edf7}
    .table-hover > tbody > tr.info:hover > td, .table-hover > tbody > tr.info:hover > th, .table-hover > tbody > tr:hover > .info, .table-hover > tbody > tr > td.info:hover, .table-hover > tbody > tr > th.info:hover {background-color: #c4e3f3}
    .table > tbody > tr.warning > td, .table > tbody > tr.warning > th, .table > tbody > tr > td.warning, .table > tbody > tr > th.warning, .table > tfoot > tr.warning > td, .table > tfoot > tr.warning > th, .table > tfoot > tr > td.warning, .table > tfoot > tr > th.warning, .table > thead > tr.warning > td, .table > thead > tr.warning > th, .table > thead > tr > td.warning, .table > thead > tr > th.warning {background-color: #fcf8e3}
    .table-hover > tbody > tr.warning:hover > td, .table-hover > tbody > tr.warning:hover > th, .table-hover > tbody > tr:hover > .warning, .table-hover > tbody > tr > td.warning:hover, .table-hover > tbody > tr > th.warning:hover {background-color: #faf2cc}
    .table > tbody > tr.danger > td, .table > tbody > tr.danger > th, .table > tbody > tr > td.danger, .table > tbody > tr > th.danger, .table > tfoot > tr.danger > td, .table > tfoot > tr.danger > th, .table > tfoot > tr > td.danger, .table > tfoot > tr > th.danger, .table > thead > tr.danger > td, .table > thead > tr.danger > th, .table > thead > tr > td.danger, .table > thead > tr > th.danger {background-color: #f2dede}
    .table-hover > tbody > tr.danger:hover > td, .table-hover > tbody > tr.danger:hover > th, .table-hover > tbody > tr:hover > .danger, .table-hover > tbody > tr > td.danger:hover, .table-hover > tbody > tr > th.danger:hover {background-color: #ebcccc}
    .table-responsive {min-height: .01%;overflow-x: auto}
    @media screen and (max-width: 767px) {
        .table-responsive {width: 100%;margin-bottom: 15px;overflow-y: hidden;-ms-overflow-style: -ms-autohiding-scrollbar;border: 1px solid #ddd}
        .table-responsive > .table {margin-bottom: 0}
        .table-responsive > .table > tbody > tr > td, .table-responsive > .table > tbody > tr > th, .table-responsive > .table > tfoot > tr > td, .table-responsive > .table > tfoot > tr > th, .table-responsive > .table > thead > tr > td, .table-responsive > .table > thead > tr > th {white-space: nowrap}
        .table-responsive > .table-bordered {border: 0}
        .table-responsive > .table-bordered > tbody > tr > td:first-child, .table-responsive > .table-bordered > tbody > tr > th:first-child, .table-responsive > .table-bordered > tfoot > tr > td:first-child, .table-responsive > .table-bordered > tfoot > tr > th:first-child, .table-responsive > .table-bordered > thead > tr > td:first-child, .table-responsive > .table-bordered > thead > tr > th:first-child {border-left: 0}
        .table-responsive > .table-bordered > tbody > tr > td:last-child, .table-responsive > .table-bordered > tbody > tr > th:last-child, .table-responsive > .table-bordered > tfoot > tr > td:last-child, .table-responsive > .table-bordered > tfoot > tr > th:last-child, .table-responsive > .table-bordered > thead > tr > td:last-child, .table-responsive > .table-bordered > thead > tr > th:last-child {border-right: 0}
        .table-responsive > .table-bordered > tbody > tr:last-child > td, .table-responsive > .table-bordered > tbody > tr:last-child > th, .table-responsive > .table-bordered > tfoot > tr:last-child > td, .table-responsive > .table-bordered > tfoot > tr:last-child > th {border-bottom: 0}
    }
    fieldset {min-width: 0;padding: 0;margin: 0;border: 0}
    legend {display: block;width: 100%;padding: 0;margin-bottom: 20px;font-size: 21px;line-height: inherit;color: #333;border: 0;border-bottom: 1px solid #e5e5e5}
    label {display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700}
    input[type=search] {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box}
    input[type=checkbox], input[type=radio] {margin: 4px 0 0;margin-top: 1px \9;line-height: normal}
    input[type=file] {display: block}
    input[type=range] {display: block;width: 100%}
    select[multiple], select[size] {height: auto}
    input[type=file]:focus, input[type=checkbox]:focus, input[type=radio]:focus {outline: thin dotted;outline: 5px auto -webkit-focus-ring-color;outline-offset: -2px}
    output {display: block;padding-top: 7px;font-size: 14px;line-height: 1.42857143;color: #555}
    .form-control {display: block;width: 100%;height: 34px;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s}
    .form-control:focus {border-color: #66afe9;outline: 0;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6)}
    .form-control::-moz-placeholder {color: #999;opacity: 1}
    .form-control:-ms-input-placeholder {color: #999}
    .form-control::-webkit-input-placeholder {color: #999}
    .form-control::-ms-expand {background-color: transparent;border: 0}
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {background-color: #eee;opacity: 1}
    .form-control[disabled], fieldset[disabled] .form-control {cursor: not-allowed}
    textarea.form-control {height: auto}
    input[type=search] {-webkit-appearance: none}
    @media screen and (-webkit-min-device-pixel-ratio: 0) {
        input[type=date].form-control, input[type=time].form-control, input[type=datetime-local].form-control, input[type=month].form-control {line-height: 34px}
        .input-group-sm input[type=date], .input-group-sm input[type=time], .input-group-sm input[type=datetime-local], .input-group-sm input[type=month], input[type=date].input-sm, input[type=time].input-sm, input[type=datetime-local].input-sm, input[type=month].input-sm {line-height: 30px}
        .input-group-lg input[type=date], .input-group-lg input[type=time], .input-group-lg input[type=datetime-local], .input-group-lg input[type=month], input[type=date].input-lg, input[type=time].input-lg, input[type=datetime-local].input-lg, input[type=month].input-lg {line-height: 46px}
    }
    .form-group {margin-bottom: 15px}
    .checkbox, .radio {position: relative;display: block;margin-top: 10px;margin-bottom: 10px}
    .checkbox label, .radio label {min-height: 20px;padding-left: 20px;margin-bottom: 0;font-weight: 400;cursor: pointer}
    .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {position: absolute;margin-top: 4px \9;margin-left: -20px}
    .checkbox + .checkbox, .radio + .radio {margin-top: -5px}
    .checkbox-inline, .radio-inline {position: relative;display: inline-block;padding-left: 20px;margin-bottom: 0;font-weight: 400;vertical-align: middle;cursor: pointer}
    .checkbox-inline + .checkbox-inline, .radio-inline + .radio-inline {margin-top: 0;margin-left: 10px}
    fieldset[disabled] input[type=checkbox], fieldset[disabled] input[type=radio], input[type=checkbox].disabled, input[type=checkbox][disabled], input[type=radio].disabled, input[type=radio][disabled] {cursor: not-allowed}
    .checkbox-inline.disabled, .radio-inline.disabled, fieldset[disabled] .checkbox-inline, fieldset[disabled] .radio-inline {cursor: not-allowed}
    .checkbox.disabled label, .radio.disabled label, fieldset[disabled] .checkbox label, fieldset[disabled] .radio label {cursor: not-allowed}
    .form-control-static {min-height: 34px;padding-top: 7px;padding-bottom: 7px;margin-bottom: 0}
    .form-control-static.input-lg, .form-control-static.input-sm {padding-right: 0;padding-left: 0}
    .input-sm {height: 30px;padding: 5px 10px;font-size: 12px;line-height: 1.5;border-radius: 3px}
    select.input-sm {height: 30px;line-height: 30px}
    select[multiple].input-sm, textarea.input-sm {height: auto}
    .form-group-sm .form-control {height: 30px;padding: 5px 10px;font-size: 12px;line-height: 1.5;border-radius: 3px}
    .form-group-sm select.form-control {height: 30px;line-height: 30px}
    .form-group-sm select[multiple].form-control, .form-group-sm textarea.form-control {height: auto}
    .form-group-sm .form-control-static {height: 30px;min-height: 32px;padding: 6px 10px;font-size: 12px;line-height: 1.5}
    .input-lg {height: 46px;padding: 10px 16px;font-size: 18px;line-height: 1.3333333;border-radius: 6px}
    select.input-lg {height: 46px;line-height: 46px}
    select[multiple].input-lg, textarea.input-lg {height: auto}
    .form-group-lg .form-control {height: 46px;padding: 10px 16px;font-size: 18px;line-height: 1.3333333;border-radius: 6px}
    .form-group-lg select.form-control {height: 46px;line-height: 46px}
    .form-group-lg select[multiple].form-control, .form-group-lg textarea.form-control {height: auto}
    .form-group-lg .form-control-static {height: 46px;min-height: 38px;padding: 11px 16px;font-size: 18px;line-height: 1.3333333}
    .has-feedback {position: relative}
    .has-feedback .form-control {padding-right: 42.5px}
    .form-control-feedback {position: absolute;top: 0;right: 0;z-index: 2;display: block;width: 34px;height: 34px;line-height: 34px;text-align: center;pointer-events: none}
    .form-group-lg .form-control + .form-control-feedback, .input-group-lg + .form-control-feedback, .input-lg + .form-control-feedback {width: 46px;height: 46px;line-height: 46px}
    .form-group-sm .form-control + .form-control-feedback, .input-group-sm + .form-control-feedback, .input-sm + .form-control-feedback {width: 30px;height: 30px;line-height: 30px}
    .has-success .checkbox, .has-success .checkbox-inline, .has-success .control-label, .has-success .help-block, .has-success .radio, .has-success .radio-inline, .has-success.checkbox label, .has-success.checkbox-inline label, .has-success.radio label, .has-success.radio-inline label {color: #3c763d}
    .has-success .form-control {border-color: #3c763d;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)}
    .has-success .form-control:focus {border-color: #2b542c;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168;box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168}
    .has-success .input-group-addon {color: #3c763d;background-color: #dff0d8;border-color: #3c763d}
    .has-success .form-control-feedback {color: #3c763d}
    .has-warning .checkbox, .has-warning .checkbox-inline, .has-warning .control-label, .has-warning .help-block, .has-warning .radio, .has-warning .radio-inline, .has-warning.checkbox label, .has-warning.checkbox-inline label, .has-warning.radio label, .has-warning.radio-inline label {color: #8a6d3b}
    .has-warning .form-control {border-color: #8a6d3b;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)}
    .has-warning .form-control:focus {border-color: #66512c;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b;box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b}
    .has-warning .input-group-addon {color: #8a6d3b;background-color: #fcf8e3;border-color: #8a6d3b}
    .has-warning .form-control-feedback {color: #8a6d3b}
    .has-error .checkbox, .has-error .checkbox-inline, .has-error .control-label, .has-error .help-block, .has-error .radio, .has-error .radio-inline, .has-error.checkbox label, .has-error.checkbox-inline label, .has-error.radio label, .has-error.radio-inline label {color: #a94442}
    .has-error .form-control {border-color: #a94442;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)}
    .has-error .form-control:focus {border-color: #843534;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483}
    .has-error .input-group-addon {color: #a94442;background-color: #f2dede;border-color: #a94442}
    .has-error .form-control-feedback {color: #a94442}
    .has-feedback label ~ .form-control-feedback {top: 25px}
    .has-feedback label.sr-only ~ .form-control-feedback {top: 0}
    .help-block {display: block;margin-top: 5px;margin-bottom: 10px;color: #737373}
    @media (min-width: 768px) {
        .form-inline .form-group {display: inline-block;margin-bottom: 0;vertical-align: middle}
        .form-inline .form-control {display: inline-block;width: auto;vertical-align: middle}
        .form-inline .form-control-static {display: inline-block}
        .form-inline .input-group {display: inline-table;vertical-align: middle}
        .form-inline .input-group .form-control, .form-inline .input-group .input-group-addon, .form-inline .input-group .input-group-btn {width: auto}
        .form-inline .input-group > .form-control {width: 100%}
        .form-inline .control-label {margin-bottom: 0;vertical-align: middle}
        .form-inline .checkbox, .form-inline .radio {display: inline-block;margin-top: 0;margin-bottom: 0;vertical-align: middle}
        .form-inline .checkbox label, .form-inline .radio label {padding-left: 0}
        .form-inline .checkbox input[type=checkbox], .form-inline .radio input[type=radio] {position: relative;margin-left: 0}
        .form-inline .has-feedback .form-control-feedback {top: 0}
    }
    .form-horizontal .checkbox, .form-horizontal .checkbox-inline, .form-horizontal .radio, .form-horizontal .radio-inline {padding-top: 7px;margin-top: 0;margin-bottom: 0}
    .form-horizontal .checkbox, .form-horizontal .radio {min-height: 27px}
    .form-horizontal .form-group {margin-right: -15px;margin-left: -15px}
    @media (min-width: 768px) {
        .form-horizontal .control-label {padding-top: 7px;margin-bottom: 0;text-align: right}
    }
    .form-horizontal .has-feedback .form-control-feedback {right: 15px}
    @media (min-width: 768px) {
        .form-horizontal .form-group-lg .control-label {padding-top: 11px;font-size: 18px}
    }
    @media (min-width: 768px) {
        .form-horizontal .form-group-sm .control-label {padding-top: 6px;font-size: 12px}
    }
    .btn {display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height: 1.42857143;text-align: center;white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;cursor: pointer;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background-image: none;border: 1px solid transparent;border-radius: 4px}
    .btn.active.focus, .btn.active:focus, .btn.focus, .btn:active.focus, .btn:active:focus, .btn:focus {outline: thin dotted;outline: 5px auto -webkit-focus-ring-color;outline-offset: -2px}
    .btn.focus, .btn:focus, .btn:hover {color: #333;text-decoration: none}
    .btn.active, .btn:active {background-image: none;outline: 0;-webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125)}
    .btn.disabled, .btn[disabled], fieldset[disabled] .btn {cursor: not-allowed;filter: alpha(opacity=65);-webkit-box-shadow: none;box-shadow: none;opacity: .65}
    a.btn.disabled, fieldset[disabled] a.btn {pointer-events: none}
    .btn-default {color: #333;background-color: #fff;border-color: #ccc}
    .btn-default.focus, .btn-default:focus {color: #333;background-color: #e6e6e6;border-color: #8c8c8c}
    .btn-default:hover {color: #333;background-color: #e6e6e6;border-color: #adadad}
    .btn-default.active, .btn-default:active, .open > .dropdown-toggle.btn-default {color: #333;background-color: #e6e6e6;border-color: #adadad}
    .btn-default.active.focus, .btn-default.active:focus, .btn-default.active:hover, .btn-default:active.focus, .btn-default:active:focus, .btn-default:active:hover, .open > .dropdown-toggle.btn-default.focus, .open > .dropdown-toggle.btn-default:focus, .open > .dropdown-toggle.btn-default:hover {color: #333;background-color: #d4d4d4;border-color: #8c8c8c}
    .btn-default.active, .btn-default:active, .open > .dropdown-toggle.btn-default {background-image: none}
    .btn-default.disabled.focus, .btn-default.disabled:focus, .btn-default.disabled:hover, .btn-default[disabled].focus, .btn-default[disabled]:focus, .btn-default[disabled]:hover, fieldset[disabled] .btn-default.focus, fieldset[disabled] .btn-default:focus, fieldset[disabled] .btn-default:hover {background-color: #fff;border-color: #ccc}
    .btn-default .badge {color: #fff;background-color: #333}
    .btn-primary {color: #fff;background-color: #337ab7;border-color: #2e6da4}
    .btn-primary.focus, .btn-primary:focus {color: #fff;background-color: #286090;border-color: #122b40}
    .btn-primary:hover {color: #fff;background-color: #286090;border-color: #204d74}
    .btn-primary.active, .btn-primary:active, .open > .dropdown-toggle.btn-primary {color: #fff;background-color: #286090;border-color: #204d74}
    .btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary:active.focus, .btn-primary:active:focus, .btn-primary:active:hover, .open > .dropdown-toggle.btn-primary.focus, .open > .dropdown-toggle.btn-primary:focus, .open > .dropdown-toggle.btn-primary:hover {color: #fff;background-color: #204d74;border-color: #122b40}
    .btn-primary.active, .btn-primary:active, .open > .dropdown-toggle.btn-primary {background-image: none}
    .btn-primary.disabled.focus, .btn-primary.disabled:focus, .btn-primary.disabled:hover, .btn-primary[disabled].focus, .btn-primary[disabled]:focus, .btn-primary[disabled]:hover, fieldset[disabled] .btn-primary.focus, fieldset[disabled] .btn-primary:focus, fieldset[disabled] .btn-primary:hover {background-color: #337ab7;border-color: #2e6da4}
    .btn-primary .badge {color: #337ab7;background-color: #fff}
    .btn-success {color: #fff;background-color: #5cb85c;border-color: #4cae4c}
    .btn-success.focus, .btn-success:focus {color: #fff;background-color: #449d44;border-color: #255625}
    .btn-success:hover {color: #fff;background-color: #449d44;border-color: #398439}
    .btn-success.active, .btn-success:active, .open > .dropdown-toggle.btn-success {color: #fff;background-color: #449d44;border-color: #398439}
    .btn-success.active.focus, .btn-success.active:focus, .btn-success.active:hover, .btn-success:active.focus, .btn-success:active:focus, .btn-success:active:hover, .open > .dropdown-toggle.btn-success.focus, .open > .dropdown-toggle.btn-success:focus, .open > .dropdown-toggle.btn-success:hover {color: #fff;background-color: #398439;border-color: #255625}
    .btn-success.active, .btn-success:active, .open > .dropdown-toggle.btn-success {background-image: none}
    .btn-success.disabled.focus, .btn-success.disabled:focus, .btn-success.disabled:hover, .btn-success[disabled].focus, .btn-success[disabled]:focus, .btn-success[disabled]:hover, fieldset[disabled] .btn-success.focus, fieldset[disabled] .btn-success:focus, fieldset[disabled] .btn-success:hover {background-color: #5cb85c;border-color: #4cae4c}
    .btn-success .badge {color: #5cb85c;background-color: #fff}
    .btn-info {color: #fff;background-color: #5bc0de;border-color: #46b8da}
    .btn-info.focus, .btn-info:focus {color: #fff;background-color: #31b0d5;border-color: #1b6d85}
    .btn-info:hover {color: #fff;background-color: #31b0d5;border-color: #269abc}
    .btn-info.active, .btn-info:active, .open > .dropdown-toggle.btn-info {color: #fff;background-color: #31b0d5;border-color: #269abc}
    .btn-info.active.focus, .btn-info.active:focus, .btn-info.active:hover, .btn-info:active.focus, .btn-info:active:focus, .btn-info:active:hover, .open > .dropdown-toggle.btn-info.focus, .open > .dropdown-toggle.btn-info:focus, .open > .dropdown-toggle.btn-info:hover {color: #fff;background-color: #269abc;border-color: #1b6d85}
    .btn-info.active, .btn-info:active, .open > .dropdown-toggle.btn-info {background-image: none}
    .btn-info.disabled.focus, .btn-info.disabled:focus, .btn-info.disabled:hover, .btn-info[disabled].focus, .btn-info[disabled]:focus, .btn-info[disabled]:hover, fieldset[disabled] .btn-info.focus, fieldset[disabled] .btn-info:focus, fieldset[disabled] .btn-info:hover {background-color: #5bc0de;border-color: #46b8da}
    .btn-info .badge {color: #5bc0de;background-color: #fff}
    .btn-warning {color: #fff;background-color: #f0ad4e;border-color: #eea236}
    .btn-warning.focus, .btn-warning:focus {color: #fff;background-color: #ec971f;border-color: #985f0d}
    .btn-warning:hover {color: #fff;background-color: #ec971f;border-color: #d58512}
    .btn-warning.active, .btn-warning:active, .open > .dropdown-toggle.btn-warning {color: #fff;background-color: #ec971f;border-color: #d58512}
    .btn-warning.active.focus, .btn-warning.active:focus, .btn-warning.active:hover, .btn-warning:active.focus, .btn-warning:active:focus, .btn-warning:active:hover, .open > .dropdown-toggle.btn-warning.focus, .open > .dropdown-toggle.btn-warning:focus, .open > .dropdown-toggle.btn-warning:hover {color: #fff;background-color: #d58512;border-color: #985f0d}
    .btn-warning.active, .btn-warning:active, .open > .dropdown-toggle.btn-warning {background-image: none}
    .btn-warning.disabled.focus, .btn-warning.disabled:focus, .btn-warning.disabled:hover, .btn-warning[disabled].focus, .btn-warning[disabled]:focus, .btn-warning[disabled]:hover, fieldset[disabled] .btn-warning.focus, fieldset[disabled] .btn-warning:focus, fieldset[disabled] .btn-warning:hover {background-color: #f0ad4e;border-color: #eea236}
    .btn-warning .badge {color: #f0ad4e;background-color: #fff}
    .btn-danger {color: #fff;background-color: #d9534f;border-color: #d43f3a}
    .btn-danger.focus, .btn-danger:focus {color: #fff;background-color: #c9302c;border-color: #761c19}
    .btn-danger:hover {color: #fff;background-color: #c9302c;border-color: #ac2925}
    .btn-danger.active, .btn-danger:active, .open > .dropdown-toggle.btn-danger {color: #fff;background-color: #c9302c;border-color: #ac2925}
    .btn-danger.active.focus, .btn-danger.active:focus, .btn-danger.active:hover, .btn-danger:active.focus, .btn-danger:active:focus, .btn-danger:active:hover, .open > .dropdown-toggle.btn-danger.focus, .open > .dropdown-toggle.btn-danger:focus, .open > .dropdown-toggle.btn-danger:hover {color: #fff;background-color: #ac2925;border-color: #761c19}
    .btn-danger.active, .btn-danger:active, .open > .dropdown-toggle.btn-danger {background-image: none}
    .btn-danger.disabled.focus, .btn-danger.disabled:focus, .btn-danger.disabled:hover, .btn-danger[disabled].focus, .btn-danger[disabled]:focus, .btn-danger[disabled]:hover, fieldset[disabled] .btn-danger.focus, fieldset[disabled] .btn-danger:focus, fieldset[disabled] .btn-danger:hover {background-color: #d9534f;border-color: #d43f3a}
    .btn-danger .badge {color: #d9534f;background-color: #fff}
    .btn-link {font-weight: 400;color: #337ab7;border-radius: 0}
    .btn-link, .btn-link.active, .btn-link:active, .btn-link[disabled], fieldset[disabled] .btn-link {background-color: transparent;-webkit-box-shadow: none;box-shadow: none}
    .btn-link, .btn-link:active, .btn-link:focus, .btn-link:hover {border-color: transparent}
    .btn-link:focus, .btn-link:hover {color: #23527c;text-decoration: underline;background-color: transparent}
    .btn-link[disabled]:focus, .btn-link[disabled]:hover, fieldset[disabled] .btn-link:focus, fieldset[disabled] .btn-link:hover {color: #777;text-decoration: none}
    .btn-group-lg > .btn, .btn-lg {padding: 10px 16px;font-size: 18px;line-height: 1.3333333;border-radius: 6px}
    .btn-group-sm > .btn, .btn-sm {padding: 5px 10px;font-size: 12px;line-height: 1.5;border-radius: 3px}
    .btn-group-xs > .btn, .btn-xs {padding: 1px 5px;font-size: 12px;line-height: 1.5;border-radius: 3px}
    .btn-block {display: block;width: 100%}
    .btn-block + .btn-block {margin-top: 5px}
    input[type=button].btn-block, input[type=reset].btn-block, input[type=submit].btn-block {width: 100%}
    .fade {opacity: 0;-webkit-transition: opacity .15s linear;-o-transition: opacity .15s linear;transition: opacity .15s linear}
    .fade.in {opacity: 1}
    .collapse {display: none}
    .collapse.in {display: block}
    tr.collapse.in {display: table-row}
    tbody.collapse.in {display: table-row-group}
    .collapsing {position: relative;height: 0;overflow: hidden;-webkit-transition-timing-function: ease;-o-transition-timing-function: ease;transition-timing-function: ease;-webkit-transition-duration: .35s;-o-transition-duration: .35s;transition-duration: .35s;-webkit-transition-property: height, visibility;-o-transition-property: height, visibility;transition-property: height, visibility}
    .caret {display: inline-block;width: 0;height: 0;margin-left: 2px;vertical-align: middle;border-top: 4px dashed;border-top: 4px solid \9;border-right: 4px solid transparent;border-left: 4px solid transparent}
    .dropdown, .dropup {position: relative}
    .dropdown-toggle:focus {outline: 0}
    .dropdown-menu {position: absolute;top: 100%;left: 0;z-index: 1000;display: none;float: left;min-width: 160px;padding: 5px 0;margin: 2px 0 0;font-size: 14px;text-align: left;list-style: none;background-color: #fff;-webkit-background-clip: padding-box;background-clip: padding-box;border: 1px solid #ccc;border: 1px solid rgba(0, 0, 0, .15);border-radius: 4px;-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);box-shadow: 0 6px 12px rgba(0, 0, 0, .175)}
    .dropdown-menu.pull-right {right: 0;left: auto}
    .dropdown-menu .divider {height: 1px;margin: 9px 0;overflow: hidden;background-color: #e5e5e5}
    .dropdown-menu > li > a {display: block;padding: 3px 20px;clear: both;font-weight: 400;line-height: 1.42857143;color: #333;white-space: nowrap}
    .dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover {color: #262626;text-decoration: none;background-color: #f5f5f5}
    .dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover {color: #fff;text-decoration: none;background-color: #337ab7;outline: 0}
    .dropdown-menu > .disabled > a, .dropdown-menu > .disabled > a:focus, .dropdown-menu > .disabled > a:hover {color: #777}
    .dropdown-menu > .disabled > a:focus, .dropdown-menu > .disabled > a:hover {text-decoration: none;cursor: not-allowed;background-color: transparent;background-image: none;filter: progid:DXImageTransform.Microsoft.gradient(enabled=false)}
    .open > .dropdown-menu {display: block}
    .open > a {outline: 0}
    .dropdown-menu-right {right: 0;left: auto}
    .dropdown-menu-left {right: auto;left: 0}
    .dropdown-header {display: block;padding: 3px 20px;font-size: 12px;line-height: 1.42857143;color: #777;white-space: nowrap}
    .dropdown-backdrop {position: fixed;top: 0;right: 0;bottom: 0;left: 0;z-index: 990}
    .pull-right > .dropdown-menu {right: 0;left: auto}
    .dropup .caret, .navbar-fixed-bottom .dropdown .caret {content: "";border-top: 0;border-bottom: 4px dashed;border-bottom: 4px solid \9}
    .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {top: auto;bottom: 100%;margin-bottom: 2px}
    @media (min-width: 768px) {
        .navbar-right .dropdown-menu {right: 0;left: auto}
        .navbar-right .dropdown-menu-left {right: auto;left: 0}
    }
    .btn-group, .btn-group-vertical {position: relative;display: inline-block;vertical-align: middle}
    .btn-group-vertical > .btn, .btn-group > .btn {position: relative;float: left}
    .btn-group-vertical > .btn.active, .btn-group-vertical > .btn:active, .btn-group-vertical > .btn:focus, .btn-group-vertical > .btn:hover, .btn-group > .btn.active, .btn-group > .btn:active, .btn-group > .btn:focus, .btn-group > .btn:hover {z-index: 2}
    .btn-group .btn + .btn, .btn-group .btn + .btn-group, .btn-group .btn-group + .btn, .btn-group .btn-group + .btn-group {margin-left: -1px}
    .btn-toolbar {margin-left: -5px}
    .btn-toolbar .btn, .btn-toolbar .btn-group, .btn-toolbar .input-group {float: left}
    .btn-toolbar > .btn, .btn-toolbar > .btn-group, .btn-toolbar > .input-group {margin-left: 5px}
    .btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {border-radius: 0}
    .btn-group > .btn:first-child {margin-left: 0}
    .btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {border-top-right-radius: 0;border-bottom-right-radius: 0}
    .btn-group > .btn:last-child:not(:first-child), .btn-group > .dropdown-toggle:not(:first-child) {border-top-left-radius: 0;border-bottom-left-radius: 0}
    .btn-group > .btn-group {float: left}
    .btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {border-radius: 0}
    .btn-group > .btn-group:first-child:not(:last-child) > .btn:last-child, .btn-group > .btn-group:first-child:not(:last-child) > .dropdown-toggle {border-top-right-radius: 0;border-bottom-right-radius: 0}
    .btn-group > .btn-group:last-child:not(:first-child) > .btn:first-child {border-top-left-radius: 0;border-bottom-left-radius: 0}
    .btn-group .dropdown-toggle:active, .btn-group.open .dropdown-toggle {outline: 0}
    .btn-group > .btn + .dropdown-toggle {padding-right: 8px;padding-left: 8px}
    .btn-group > .btn-lg + .dropdown-toggle {padding-right: 12px;padding-left: 12px}
    .btn-group.open .dropdown-toggle {-webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125)}
    .btn-group.open .dropdown-toggle.btn-link {-webkit-box-shadow: none;box-shadow: none}
    .btn .caret {margin-left: 0}
    .btn-lg .caret {border-width: 5px 5px 0;border-bottom-width: 0}
    .dropup .btn-lg .caret {border-width: 0 5px 5px}
    .btn-group-vertical > .btn, .btn-group-vertical > .btn-group, .btn-group-vertical > .btn-group > .btn {display: block;float: none;width: 100%;max-width: 100%}
    .btn-group-vertical > .btn-group > .btn {float: none}
    .btn-group-vertical > .btn + .btn, .btn-group-vertical > .btn + .btn-group, .btn-group-vertical > .btn-group + .btn, .btn-group-vertical > .btn-group + .btn-group {margin-top: -1px;margin-left: 0}
    .btn-group-vertical > .btn:not(:first-child):not(:last-child) {border-radius: 0}
    .btn-group-vertical > .btn:first-child:not(:last-child) {border-top-left-radius: 4px;border-top-right-radius: 4px;border-bottom-right-radius: 0;border-bottom-left-radius: 0}
    .btn-group-vertical > .btn:last-child:not(:first-child) {border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 4px;border-bottom-left-radius: 4px}
    .btn-group-vertical > .btn-group:not(:first-child):not(:last-child) > .btn {border-radius: 0}
    .btn-group-vertical > .btn-group:first-child:not(:last-child) > .btn:last-child, .btn-group-vertical > .btn-group:first-child:not(:last-child) > .dropdown-toggle {border-bottom-right-radius: 0;border-bottom-left-radius: 0}
    .btn-group-vertical > .btn-group:last-child:not(:first-child) > .btn:first-child {border-top-left-radius: 0;border-top-right-radius: 0}
    .btn-group-justified {display: table;width: 100%;table-layout: fixed;border-collapse: separate}
    .btn-group-justified > .btn, .btn-group-justified > .btn-group {display: table-cell;float: none;width: 1%}
    .btn-group-justified > .btn-group .btn {width: 100%}
    .btn-group-justified > .btn-group .dropdown-menu {left: auto}
    [data-toggle=buttons] > .btn input[type=checkbox], [data-toggle=buttons] > .btn input[type=radio], [data-toggle=buttons] > .btn-group > .btn input[type=checkbox], [data-toggle=buttons] > .btn-group > .btn input[type=radio] {position: absolute;clip: rect(0, 0, 0, 0);pointer-events: none}
    .input-group {position: relative;display: table;border-collapse: separate}
    .input-group[class*=col-] {float: none;padding-right: 0;padding-left: 0}
    .input-group .form-control {position: relative;z-index: 2;float: left;width: 100%;margin-bottom: 0}
    .input-group .form-control:focus {z-index: 3}
    .input-group-lg > .form-control, .input-group-lg > .input-group-addon, .input-group-lg > .input-group-btn > .btn {height: 46px;padding: 10px 16px;font-size: 18px;line-height: 1.3333333;border-radius: 6px}
    select.input-group-lg > .form-control, select.input-group-lg > .input-group-addon, select.input-group-lg > .input-group-btn > .btn {height: 46px;line-height: 46px}
    select[multiple].input-group-lg > .form-control, select[multiple].input-group-lg > .input-group-addon, select[multiple].input-group-lg > .input-group-btn > .btn, textarea.input-group-lg > .form-control, textarea.input-group-lg > .input-group-addon, textarea.input-group-lg > .input-group-btn > .btn {height: auto}
    .input-group-sm > .form-control, .input-group-sm > .input-group-addon, .input-group-sm > .input-group-btn > .btn {height: 30px;padding: 5px 10px;font-size: 12px;line-height: 1.5;border-radius: 3px}
    select.input-group-sm > .form-control, select.input-group-sm > .input-group-addon, select.input-group-sm > .input-group-btn > .btn {height: 30px;line-height: 30px}
    select[multiple].input-group-sm > .form-control, select[multiple].input-group-sm > .input-group-addon, select[multiple].input-group-sm > .input-group-btn > .btn, textarea.input-group-sm > .form-control, textarea.input-group-sm > .input-group-addon, textarea.input-group-sm > .input-group-btn > .btn {height: auto}
    .input-group .form-control, .input-group-addon, .input-group-btn {display: table-cell}
    .input-group .form-control:not(:first-child):not(:last-child), .input-group-addon:not(:first-child):not(:last-child), .input-group-btn:not(:first-child):not(:last-child) {border-radius: 0}
    .input-group-addon, .input-group-btn {width: 1%;white-space: nowrap;vertical-align: middle}
    .input-group-addon {padding: 6px 12px;font-size: 14px;font-weight: 400;line-height: 1;color: #555;text-align: center;background-color: #eee;border: 1px solid #ccc;border-radius: 4px}
    .input-group-addon.input-sm {padding: 5px 10px;font-size: 12px;border-radius: 3px}
    .input-group-addon.input-lg {padding: 10px 16px;font-size: 18px;border-radius: 6px}
    .input-group-addon input[type=checkbox], .input-group-addon input[type=radio] {margin-top: 0}
    .input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child > .btn, .input-group-btn:first-child > .btn-group > .btn, .input-group-btn:first-child > .dropdown-toggle, .input-group-btn:last-child > .btn-group:not(:last-child) > .btn, .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle) {border-top-right-radius: 0;border-bottom-right-radius: 0}
    .input-group-addon:first-child {border-right: 0}
    .input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:first-child > .btn-group:not(:first-child) > .btn, .input-group-btn:first-child > .btn:not(:first-child), .input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group > .btn, .input-group-btn:last-child > .dropdown-toggle {border-top-left-radius: 0;border-bottom-left-radius: 0}
    .input-group-addon:last-child {border-left: 0}
    .input-group-btn {position: relative;font-size: 0;white-space: nowrap}
    .input-group-btn > .btn {position: relative}
    .input-group-btn > .btn + .btn {margin-left: -1px}
    .input-group-btn > .btn:active, .input-group-btn > .btn:focus, .input-group-btn > .btn:hover {z-index: 2}
    .input-group-btn:first-child > .btn, .input-group-btn:first-child > .btn-group {margin-right: -1px}
    .input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group {z-index: 2;margin-left: -1px}
      /*# sourceMappingURL=bootstrap.min.css.map */
    @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic);

    /*
 * Core: General Layout Style
 * -------------------------
 */
    html,
    body {
        min-height: 100%;
    }
    .layout-boxed html,
    .layout-boxed body {
        height: 100%;
    }
    body {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-weight: 400;
        overflow-x: hidden;
        overflow-y: auto;
    }
    /* Layout */
    .wrapper {
        min-height: 100%;
        position: relative;
        overflow: hidden;
    }
    .wrapper:before,
    .wrapper:after {
        content: " ";
        display: table;
    }
    .wrapper:after {
        clear: both;
    }
    .layout-boxed .wrapper {
        max-width: 1250px;
        margin: 0 auto;
        min-height: 100%;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.5);
        position: relative;
    }
    .layout-boxed {
        /*background: url('../img/boxed-bg.jpg') repeat fixed;*/
    }
    /*
 * Content Wrapper - contains the main content
 * ```.right-side has been deprecated as of v2.0.0 in favor of .content-wrapper  ```
 */
    .content-wrapper,
    .right-side,
    .main-footer {
        -webkit-transition: -webkit-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
        -moz-transition: -moz-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
        -o-transition: -o-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
        transition: transform 0.3s ease-in-out, margin 0.3s ease-in-out;
        margin-left: 230px;
        z-index: 820;
    }
    .layout-top-nav .content-wrapper,
    .layout-top-nav .right-side,
    .layout-top-nav .main-footer {
        margin-left: 0;
    }
    @media (max-width: 767px) {
        .content-wrapper,
        .right-side,
        .main-footer {
            margin-left: 0;
        }
    }
    @media (min-width: 768px) {
        .sidebar-collapse .content-wrapper,
        .sidebar-collapse .right-side,
        .sidebar-collapse .main-footer {
            margin-left: 0;
        }
    }
    @media (max-width: 767px) {
        .sidebar-open .content-wrapper,
        .sidebar-open .right-side,
        .sidebar-open .main-footer {
            -webkit-transform: translate(230px, 0);
            -ms-transform: translate(230px, 0);
            -o-transform: translate(230px, 0);
            transform: translate(230px, 0);
        }
    }
    .content-wrapper,
    .right-side {
        min-height: 100%;
        background-color: #ecf0f5;
        z-index: 800;
    }
    .main-footer {
        background: #fff;
        padding: 15px;
        color: #444;
        border-top: 1px solid #d2d6de;
    }
    /* Fixed layout */
    .fixed .main-header,
    .fixed .main-sidebar,
    .fixed .left-side {
        position: fixed;
    }
    .fixed .main-header {
        top: 0;
        right: 0;
        left: 0;
    }
    .fixed .content-wrapper,
    .fixed .right-side {
        padding-top: 50px;
    }
    @media (max-width: 767px) {
        .fixed .content-wrapper,
        .fixed .right-side {
            padding-top: 100px;
        }
    }
    .fixed.layout-boxed .wrapper {
        max-width: 100%;
    }
    body.hold-transition .content-wrapper,
    body.hold-transition .right-side,
    body.hold-transition .main-footer,
    body.hold-transition .main-sidebar,
    body.hold-transition .left-side,
    body.hold-transition .main-header .navbar,
    body.hold-transition .main-header .logo {
        /* Fix for IE */
        -webkit-transition: none;
        -o-transition: none;
        transition: none;
    }
    /* Content */
    .content {
        min-height: 250px;
        padding: 15px;
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
    }
    /* H1 - H6 font */
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-family: 'Source Sans Pro', sans-serif;
    }
    /* General Links */
    a {
        color: #3c8dbc;
    }
    a:hover,
    a:active,
    a:focus {
        outline: none;
        text-decoration: none;
        color: #72afd2;
    }
    /* Page Header */
    .page-header {
        margin: 10px 0 20px 0;
        font-size: 22px;
    }
    .page-header > small {
        color: #666;
        display: block;
        margin-top: 5px;
    }
    /*
 * Component: Main Header
 * ----------------------
 */
    .main-header {
        position: relative;
        max-height: 100px;
        z-index: 1030;
    }
    .main-header .navbar {
        -webkit-transition: margin-left 0.3s ease-in-out;
        -o-transition: margin-left 0.3s ease-in-out;
        transition: margin-left 0.3s ease-in-out;
        margin-bottom: 0;
        margin-left: 230px;
        border: none;
        min-height: 50px;
        border-radius: 0;
    }
    .layout-top-nav .main-header .navbar {
        margin-left: 0;
    }
    .main-header #navbar-search-input.form-control {
        background: rgba(255, 255, 255, 0.2);
        border-color: transparent;
    }
    .main-header #navbar-search-input.form-control:focus,
    .main-header #navbar-search-input.form-control:active {
        border-color: rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.9);
    }
    .main-header #navbar-search-input.form-control::-moz-placeholder {
        color: #ccc;
        opacity: 1;
    }
    .main-header #navbar-search-input.form-control:-ms-input-placeholder {
        color: #ccc;
    }
    .main-header #navbar-search-input.form-control::-webkit-input-placeholder {
        color: #ccc;
    }
    .main-header .navbar-custom-menu,
    .main-header .navbar-right {
        float: right;
    }
    @media (max-width: 991px) {
        .main-header .navbar-custom-menu a,
        .main-header .navbar-right a {
            color: inherit;
            background: transparent;
        }
    }
    @media (max-width: 767px) {
        .main-header .navbar-right {
            float: none;
        }
        .navbar-collapse .main-header .navbar-right {
            margin: 7.5px -15px;
        }
        .main-header .navbar-right > li {
            color: inherit;
            border: 0;
        }
    }
    .main-header .sidebar-toggle {
        float: left;
        background-color: transparent;
        background-image: none;
        padding: 15px 15px;
        font-family: fontAwesome;
    }
    .main-header .sidebar-toggle:before {
        content: "\f0c9";
    }
    .main-header .sidebar-toggle:hover {
        color: #fff;
    }
    .main-header .sidebar-toggle:focus,
    .main-header .sidebar-toggle:active {
        background: transparent;
    }
    .main-header .sidebar-toggle .icon-bar {
        display: none;
    }
    .main-header .navbar .nav > li.user > a > .fa,
    .main-header .navbar .nav > li.user > a > .glyphicon,
    .main-header .navbar .nav > li.user > a > .ion {
        margin-right: 5px;
    }
    .main-header .navbar .nav > li > a > .label {
        position: absolute;
        top: 9px;
        right: 7px;
        text-align: center;
        font-size: 9px;
        padding: 2px 3px;
        line-height: .9;
    }
    .main-header .logo {
        -webkit-transition: width 0.3s ease-in-out;
        -o-transition: width 0.3s ease-in-out;
        transition: width 0.3s ease-in-out;
        display: block;
        float: left;
        height: 50px;
        font-size: 20px;
        line-height: 50px;
        text-align: center;
        width: 230px;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        padding: 0 15px;
        font-weight: 300;
        overflow: hidden;
    }
    .main-header .logo .logo-lg {
        display: block;
    }
    .main-header .logo .logo-mini {
        display: none;
    }
    .main-header .navbar-brand {
        color: #fff;
    }
    .content-header {
        position: relative;
        padding: 15px 15px 0 15px;
    }
    .content-header > h1 {
        margin: 0;
        font-size: 24px;
    }
    .content-header > h1 > small {
        font-size: 15px;
        display: inline-block;
        padding-left: 4px;
        font-weight: 300;
    }
    .content-header > .breadcrumb {
        float: right;
        background: transparent;
        margin-top: 0;
        margin-bottom: 0;
        font-size: 12px;
        padding: 7px 5px;
        position: absolute;
        top: 15px;
        right: 10px;
        border-radius: 2px;
    }
    .content-header > .breadcrumb > li > a {
        color: #444;
        text-decoration: none;
        display: inline-block;
    }
    .content-header > .breadcrumb > li > a > .fa,
    .content-header > .breadcrumb > li > a > .glyphicon,
    .content-header > .breadcrumb > li > a > .ion {
        margin-right: 5px;
    }
    .content-header > .breadcrumb > li + li:before {
        content: '>\00a0';
    }
    @media (max-width: 991px) {
        .content-header > .breadcrumb {
            position: relative;
            margin-top: 5px;
            top: 0;
            right: 0;
            float: none;
            background: #d2d6de;
            padding-left: 10px;
        }
        .content-header > .breadcrumb li:before {
            color: #97a0b3;
        }
    }
    .navbar-toggle {
        color: #fff;
        border: 0;
        margin: 0;
        padding: 15px 15px;
    }
    @media (max-width: 991px) {
        .navbar-custom-menu .navbar-nav > li {
            float: left;
        }
        .navbar-custom-menu .navbar-nav {
            margin: 0;
            float: left;
        }
        .navbar-custom-menu .navbar-nav > li > a {
            padding-top: 15px;
            padding-bottom: 15px;
            line-height: 20px;
        }
    }
    @media (max-width: 767px) {
        .main-header {
            position: relative;
        }
        .main-header .logo,
        .main-header .navbar {
            width: 100%;
            float: none;
        }
        .main-header .navbar {
            margin: 0;
        }
        .main-header .navbar-custom-menu {
            float: right;
        }
    }
    @media (max-width: 991px) {
        .navbar-collapse.pull-left {
            float: none !important;
        }
        .navbar-collapse.pull-left + .navbar-custom-menu {
            display: block;
            position: absolute;
            top: 0;
            right: 40px;
        }
    }
    /*
 * Component: Sidebar
 * ------------------
 */
    .main-sidebar,
    .left-side {
        position: absolute;
        top: 0;
        left: 0;
        padding-top: 50px;
        min-height: 100%;
        width: 230px;
        z-index: 810;
        -webkit-transition: -webkit-transform 0.3s ease-in-out, width 0.3s ease-in-out;
        -moz-transition: -moz-transform 0.3s ease-in-out, width 0.3s ease-in-out;
        -o-transition: -o-transform 0.3s ease-in-out, width 0.3s ease-in-out;
        transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
    }
    @media (max-width: 767px) {
        .main-sidebar,
        .left-side {
            padding-top: 100px;
        }
    }
    @media (max-width: 767px) {
        .main-sidebar,
        .left-side {
            -webkit-transform: translate(-230px, 0);
            -ms-transform: translate(-230px, 0);
            -o-transform: translate(-230px, 0);
            transform: translate(-230px, 0);
        }
    }
    @media (min-width: 768px) {
        .sidebar-collapse .main-sidebar,
        .sidebar-collapse .left-side {
            -webkit-transform: translate(-230px, 0);
            -ms-transform: translate(-230px, 0);
            -o-transform: translate(-230px, 0);
            transform: translate(-230px, 0);
        }
    }
    @media (max-width: 767px) {
        .sidebar-open .main-sidebar,
        .sidebar-open .left-side {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0);
        }
    }
    .sidebar {
        padding-bottom: 10px;
    }
    .sidebar-form input:focus {
        border-color: transparent;
    }
    .user-panel {
        position: relative;
        width: 100%;
        padding: 10px;
        overflow: hidden;
    }
    .user-panel:before,
    .user-panel:after {
        content: " ";
        display: table;
    }
    .user-panel:after {
        clear: both;
    }
    .user-panel > .image > img {
        width: 100%;
        max-width: 45px;
        height: auto;
    }
    .user-panel > .info {
        padding: 5px 5px 5px 15px;
        line-height: 1;
        position: absolute;
        left: 55px;
    }
    .user-panel > .info > p {
        font-weight: 600;
        margin-bottom: 9px;
    }
    .user-panel > .info > a {
        text-decoration: none;
        padding-right: 5px;
        margin-top: 3px;
        font-size: 11px;
    }
    .user-panel > .info > a > .fa,
    .user-panel > .info > a > .ion,
    .user-panel > .info > a > .glyphicon {
        margin-right: 3px;
    }
    .sidebar-menu {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .sidebar-menu > li {
        position: relative;
        margin: 0;
        padding: 0;
    }
    .sidebar-menu > li > a {
        padding: 12px 5px 12px 15px;
        display: block;
    }
    .sidebar-menu > li > a > .fa,
    .sidebar-menu > li > a > .glyphicon,
    .sidebar-menu > li > a > .ion {
        width: 20px;
    }
    .sidebar-menu > li .label,
    .sidebar-menu > li .badge {
        margin-right: 5px;
    }
    .sidebar-menu > li .badge {
        margin-top: 3px;
    }
    .sidebar-menu li.header {
        padding: 10px 25px 10px 15px;
        font-size: 12px;
    }
    .sidebar-menu li > a > .fa-angle-left,
    .sidebar-menu li > a > .pull-right-container > .fa-angle-left {
        width: auto;
        height: auto;
        padding: 0;
        margin-right: 10px;
    }
    .sidebar-menu li.active > a > .fa-angle-left,
    .sidebar-menu li.active > a > .pull-right-container > .fa-angle-left {
        -webkit-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }
    .sidebar-menu li.active > .treeview-menu {
        display: block;
    }
    .sidebar-menu .treeview-menu {
        display: none;
        list-style: none;
        padding: 0;
        margin: 0;
        padding-left: 5px;
    }
    .sidebar-menu .treeview-menu .treeview-menu {
        padding-left: 20px;
    }
    .sidebar-menu .treeview-menu > li {
        margin: 0;
    }
    .sidebar-menu .treeview-menu > li > a {
        padding: 5px 5px 5px 15px;
        display: block;
        font-size: 14px;
    }
    .sidebar-menu .treeview-menu > li > a > .fa,
    .sidebar-menu .treeview-menu > li > a > .glyphicon,
    .sidebar-menu .treeview-menu > li > a > .ion {
        width: 20px;
    }
    .sidebar-menu .treeview-menu > li > a > .pull-right-container > .fa-angle-left,
    .sidebar-menu .treeview-menu > li > a > .pull-right-container > .fa-angle-down,
    .sidebar-menu .treeview-menu > li > a > .fa-angle-left,
    .sidebar-menu .treeview-menu > li > a > .fa-angle-down {
        width: auto;
    }
    /*
 * Component: Sidebar Mini
 */
    @media (min-width: 768px) {
        .sidebar-mini.sidebar-collapse .content-wrapper,
        .sidebar-mini.sidebar-collapse .right-side,
        .sidebar-mini.sidebar-collapse .main-footer {
            margin-left: 50px !important;
            z-index: 840;
        }
        .sidebar-mini.sidebar-collapse .main-sidebar {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0);
            width: 50px !important;
            z-index: 850;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li {
            position: relative;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li > a {
            margin-right: 0;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li > a > span {
            border-top-right-radius: 4px;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:not(.treeview) > a > span {
            border-bottom-right-radius: 4px;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {
            padding-top: 5px;
            padding-bottom: 5px;
            border-bottom-right-radius: 4px;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > a > span:not(.pull-right),
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > .treeview-menu {
            display: block !important;
            position: absolute;
            width: 180px;
            left: 50px;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > a > span {
            top: 0;
            margin-left: -3px;
            padding: 12px 5px 12px 20px;
            background-color: inherit;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > a > .pull-right-container {
            float: right;
            width: auto !important;
            left: 200px !important;
            top: 10px !important;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > a > .pull-right-container > .label:not(:first-of-type) {
            display: none;
        }
        .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > .treeview-menu {
            top: 44px;
            margin-left: 0;
        }
        .sidebar-mini.sidebar-collapse .main-sidebar .user-panel > .info,
        .sidebar-mini.sidebar-collapse .sidebar-form,
        .sidebar-mini.sidebar-collapse .sidebar-menu > li > a > span,
        .sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu,
        .sidebar-mini.sidebar-collapse .sidebar-menu > li > a > .pull-right,
        .sidebar-mini.sidebar-collapse .sidebar-menu li.header {
            display: none !important;
            -webkit-transform: translateZ(0);
        }
        .sidebar-mini.sidebar-collapse .main-header .logo {
            width: 50px;
        }
        .sidebar-mini.sidebar-collapse .main-header .logo > .logo-mini {
            display: block;
            margin-left: -15px;
            margin-right: -15px;
            font-size: 18px;
        }
        .sidebar-mini.sidebar-collapse .main-header .logo > .logo-lg {
            display: none;
        }
        .sidebar-mini.sidebar-collapse .main-header .navbar {
            margin-left: 50px;
        }
    }
    .sidebar-menu,
    .main-sidebar .user-panel,
    .sidebar-menu > li.header {
        white-space: nowrap;
        overflow: hidden;
    }
    .sidebar-menu:hover {
        overflow: visible;
    }
    .sidebar-form,
    .sidebar-menu > li.header {
        overflow: hidden;
        text-overflow: clip;
    }
    .sidebar-menu li > a {
        position: relative;
    }
    .sidebar-menu li > a > .pull-right-container {
        position: absolute;
        right: 10px;
        top: 50%;
        margin-top: -7px;
    }
    /*
 * Component: Control sidebar. By default, this is the right sidebar.
 */
    .control-sidebar-bg {
        position: fixed;
        z-index: 1000;
        bottom: 0;
    }
    .control-sidebar-bg,
    .control-sidebar {
        top: 0;
        right: -230px;
        width: 230px;
        -webkit-transition: right 0.3s ease-in-out;
        -o-transition: right 0.3s ease-in-out;
        transition: right 0.3s ease-in-out;
    }
    .control-sidebar {
        position: absolute;
        padding-top: 50px;
        z-index: 1010;
    }
    @media (max-width: 768px) {
        .control-sidebar {
            padding-top: 100px;
        }
    }
    .control-sidebar > .tab-content {
        padding: 10px 15px;
    }
    .control-sidebar.control-sidebar-open,
    .control-sidebar.control-sidebar-open + .control-sidebar-bg {
        right: 0;
    }
    .control-sidebar-open .control-sidebar-bg,
    .control-sidebar-open .control-sidebar {
        right: 0;
    }
    @media (min-width: 768px) {
        .control-sidebar-open .content-wrapper,
        .control-sidebar-open .right-side,
        .control-sidebar-open .main-footer {
            margin-right: 230px;
        }
    }
    .nav-tabs.control-sidebar-tabs > li:first-of-type > a,
    .nav-tabs.control-sidebar-tabs > li:first-of-type > a:hover,
    .nav-tabs.control-sidebar-tabs > li:first-of-type > a:focus {
        border-left-width: 0;
    }
    .nav-tabs.control-sidebar-tabs > li > a {
        border-radius: 0;
    }
    .nav-tabs.control-sidebar-tabs > li > a,
    .nav-tabs.control-sidebar-tabs > li > a:hover {
        border-top: none;
        border-right: none;
        border-left: 1px solid transparent;
        border-bottom: 1px solid transparent;
    }
    .nav-tabs.control-sidebar-tabs > li > a .icon {
        font-size: 16px;
    }
    .nav-tabs.control-sidebar-tabs > li.active > a,
    .nav-tabs.control-sidebar-tabs > li.active > a:hover,
    .nav-tabs.control-sidebar-tabs > li.active > a:focus,
    .nav-tabs.control-sidebar-tabs > li.active > a:active {
        border-top: none;
        border-right: none;
        border-bottom: none;
    }
    @media (max-width: 768px) {
        .nav-tabs.control-sidebar-tabs {
            display: table;
        }
        .nav-tabs.control-sidebar-tabs > li {
            display: table-cell;
        }
    }
    .control-sidebar-heading {
        font-weight: 400;
        font-size: 16px;
        padding: 10px 0;
        margin-bottom: 10px;
    }
    .control-sidebar-subheading {
        display: block;
        font-weight: 400;
        font-size: 14px;
    }
    .control-sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0 -15px;
    }
    .control-sidebar-menu > li > a {
        display: block;
        padding: 10px 15px;
    }
    .control-sidebar-menu > li > a:before,
    .control-sidebar-menu > li > a:after {
        content: " ";
        display: table;
    }
    .control-sidebar-menu > li > a:after {
        clear: both;
    }
    .control-sidebar-menu > li > a > .control-sidebar-subheading {
        margin-top: 0;
    }
    .control-sidebar-menu .menu-icon {
        float: left;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        text-align: center;
        line-height: 35px;
    }
    .control-sidebar-menu .menu-info {
        margin-left: 45px;
        margin-top: 3px;
    }
    .control-sidebar-menu .menu-info > .control-sidebar-subheading {
        margin: 0;
    }
    .control-sidebar-menu .menu-info > p {
        margin: 0;
        font-size: 11px;
    }
    .control-sidebar-menu .progress {
        margin: 0;
    }
    .control-sidebar-dark {
        color: #b8c7ce;
    }
    .control-sidebar-dark,
    .control-sidebar-dark + .control-sidebar-bg {
        background: #222d32;
    }
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs {
        border-bottom: #1c2529;
    }
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a {
        background: #181f23;
        color: #b8c7ce;
    }
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:focus {
        border-left-color: #141a1d;
        border-bottom-color: #141a1d;
    }
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:focus,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:active {
        background: #1c2529;
    }
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover {
        color: #fff;
    }
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:hover,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:focus,
    .control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:active {
        background: #222d32;
        color: #fff;
    }
    .control-sidebar-dark .control-sidebar-heading,
    .control-sidebar-dark .control-sidebar-subheading {
        color: #fff;
    }
    .control-sidebar-dark .control-sidebar-menu > li > a:hover {
        background: #1e282c;
    }
    .control-sidebar-dark .control-sidebar-menu > li > a .menu-info > p {
        color: #b8c7ce;
    }
    .control-sidebar-light {
        color: #5e5e5e;
    }
    .control-sidebar-light,
    .control-sidebar-light + .control-sidebar-bg {
        background: #f9fafc;
        border-left: 1px solid #d2d6de;
    }
    .control-sidebar-light .nav-tabs.control-sidebar-tabs {
        border-bottom: #d2d6de;
    }
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a {
        background: #e8ecf4;
        color: #444444;
    }
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:hover,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:focus {
        border-left-color: #d2d6de;
        border-bottom-color: #d2d6de;
    }
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:hover,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:focus,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:active {
        background: #eff1f7;
    }
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li.active > a,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li.active > a:hover,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li.active > a:focus,
    .control-sidebar-light .nav-tabs.control-sidebar-tabs > li.active > a:active {
        background: #f9fafc;
        color: #111;
    }
    .control-sidebar-light .control-sidebar-heading,
    .control-sidebar-light .control-sidebar-subheading {
        color: #111;
    }
    .control-sidebar-light .control-sidebar-menu {
        margin-left: -14px;
    }
    .control-sidebar-light .control-sidebar-menu > li > a:hover {
        background: #f4f4f5;
    }
    .control-sidebar-light .control-sidebar-menu > li > a .menu-info > p {
        color: #5e5e5e;
    }
    /*
 * Component: Dropdown menus
 * -------------------------
 */
    /*Dropdowns in general*/

    /*
 * Component: Button
 * -----------------
 */
    .btn {
        border-radius: 3px;
        -webkit-box-shadow: none;
        box-shadow: none;
        border: 1px solid transparent;
    }
    .btn.uppercase {
        text-transform: uppercase;
    }
    .btn.btn-flat {
        border-radius: 0;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        border-width: 1px;
    }
    .btn:active {
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        -moz-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    }
    .btn:focus {
        outline: none;
    }
    .btn.btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn.btn-file > input[type='file'] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        opacity: 0;
        filter: alpha(opacity=0);
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    .btn-default {
        background-color: #f4f4f4;
        color: #444;
        border-color: #ddd;
    }
    .btn-default:hover,
    .btn-default:active,
    .btn-default.hover {
        background-color: #e7e7e7;
    }
    .btn-primary {
        background-color: #3c8dbc;
        border-color: #367fa9;
    }
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary.hover {
        background-color: #367fa9;
    }
    .btn-success {
        background-color: #00a65a;
        border-color: #008d4c;
    }
    .btn-success:hover,
    .btn-success:active,
    .btn-success.hover {
        background-color: #008d4c;
    }
    .btn-info {
        background-color: #00c0ef;
        border-color: #00acd6;
    }
    .btn-info:hover,
    .btn-info:active,
    .btn-info.hover {
        background-color: #00acd6;
    }
    .btn-danger {
        background-color: #dd4b39;
        border-color: #d73925;
    }
    .btn-danger:hover,
    .btn-danger:active,
    .btn-danger.hover {
        background-color: #d73925;
    }
    .btn-warning {
        background-color: #f39c12;
        border-color: #e08e0b;
    }
    .btn-warning:hover,
    .btn-warning:active,
    .btn-warning.hover {
        background-color: #e08e0b;
    }
    .btn-outline {
        border: 1px solid #fff;
        background: transparent;
        color: #fff;
    }
    .btn-outline:hover,
    .btn-outline:focus,
    .btn-outline:active {
        color: rgba(255, 255, 255, 0.7);
        border-color: rgba(255, 255, 255, 0.7);
    }
    .btn-link {
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    .btn[class*='bg-']:hover {
        -webkit-box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.2);
    }
    .btn-app {
        border-radius: 3px;
        position: relative;
        padding: 15px 5px;
        margin: 0 0 10px 10px;
        min-width: 80px;
        height: 60px;
        text-align: center;
        color: #666;
        border: 1px solid #ddd;
        background-color: #f4f4f4;
        font-size: 12px;
    }
    .btn-app > .fa,
    .btn-app > .glyphicon,
    .btn-app > .ion {
        font-size: 20px;
        display: block;
    }
    .btn-app:hover {
        background: #f4f4f4;
        color: #444;
        border-color: #aaa;
    }
    .btn-app:active,
    .btn-app:focus {
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        -moz-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    }
    .btn-app > .badge {
        position: absolute;
        top: -3px;
        right: -10px;
        font-size: 10px;
        font-weight: 400;
    }
    /*
 * Component: Table
 * ----------------
 */
    .table > thead > tr > th,
    .table > tbody > tr > th,
    .table > tfoot > tr > th,
    .table > thead > tr > td,
    .table > tbody > tr > td,
    .table > tfoot > tr > td {
        border-top: 1px solid #f4f4f4;
    }
    .table > thead > tr > th {
        border-bottom: 2px solid #f4f4f4;
    }
    .table tr td .progress {
        margin-top: 5px;
    }
    .table-bordered {
        border: 1px solid #f4f4f4;
    }
    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        border: 1px solid #f4f4f4;
    }
    .table-bordered > thead > tr > th,
    .table-bordered > thead > tr > td {
        border-bottom-width: 2px;
    }
    .table.no-border,
    .table.no-border td,
    .table.no-border th {
        border: 0;
    }
    /* .text-center in tables */
    table.text-center,
    table.text-center td,
    table.text-center th {
        text-align: center;
    }
    .table.align th {
        text-align: left;
    }
    .table.align td {
        text-align: right;
    }
    /*
 * Component: Label
 * ----------------
 */
    .label-default {
        background-color: #d2d6de;
        color: #444;
    }

    /*
 * Page: Invoice
 * -------------
 */
    .invoice {
        position: relative;
        background: #fff;
        border: 1px solid #f4f4f4;
        padding: 20px;
        margin: 10px 25px;
    }
    .invoice-title {
        margin-top: 0;
    }
    /*
 * Page: Profile
 * -------------
 */
    .profile-user-img {
        margin: 0 auto;
        width: 100px;
        padding: 3px;
        border: 3px solid #d2d6de;
    }
    .profile-username {
        font-size: 21px;
        margin-top: 5px;
    }
    .post {
        border-bottom: 1px solid #d2d6de;
        margin-bottom: 15px;
        padding-bottom: 15px;
        color: #666;
    }
    .post:last-of-type {
        border-bottom: 0;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    .post .user-block {
        margin-bottom: 15px;
    }

    /*
 * General: Miscellaneous
 * ----------------------
 */
    .pad {
        padding: 10px;
    }
    .margin {
        margin: 10px;
    }
    .margin-bottom {
        margin-bottom: 20px;
    }
    .margin-bottom-none {
        margin-bottom: 0;
    }
    .margin-r-5 {
        margin-right: 5px;
    }
    .inline {
        display: inline;
    }
    .description-block {
        display: block;
        margin: 10px 0;
        text-align: center;
    }
    .description-block.margin-bottom {
        margin-bottom: 25px;
    }
    .description-block > .description-header {
        margin: 0;
        padding: 0;
        font-weight: 600;
        font-size: 16px;
    }
    .description-block > .description-text {
        text-transform: uppercase;
    }
    .bg-red,
    .bg-yellow,
    .bg-aqua,
    .bg-blue,
    .bg-light-blue,
    .bg-green,
    .bg-navy,
    .bg-teal,
    .bg-olive,
    .bg-lime,
    .bg-orange,
    .bg-fuchsia,
    .bg-purple,
    .bg-maroon,
    .bg-black,
    .bg-red-active,
    .bg-yellow-active,
    .bg-aqua-active,
    .bg-blue-active,
    .bg-light-blue-active,
    .bg-green-active,
    .bg-navy-active,
    .bg-teal-active,
    .bg-olive-active,
    .bg-lime-active,
    .bg-orange-active,
    .bg-fuchsia-active,
    .bg-purple-active,
    .bg-maroon-active,
    .bg-black-active,
    .callout.callout-danger,
    .callout.callout-warning,
    .callout.callout-info,
    .callout.callout-success,
    .alert-success,
    .alert-danger,
    .alert-error,
    .alert-warning,
    .alert-info,
    .label-danger,
    .label-info,
    .label-warning,
    .label-primary,
    .label-success,
    .modal-primary .modal-body,
    .modal-primary .modal-header,
    .modal-primary .modal-footer,
    .modal-warning .modal-body,
    .modal-warning .modal-header,
    .modal-warning .modal-footer,
    .modal-info .modal-body,
    .modal-info .modal-header,
    .modal-info .modal-footer,
    .modal-success .modal-body,
    .modal-success .modal-header,
    .modal-success .modal-footer,
    .modal-danger .modal-body,
    .modal-danger .modal-header,
    .modal-danger .modal-footer {
        color: #fff !important;
    }
    .bg-gray {
        color: #000;
        background-color: #d2d6de !important;
    }
    .bg-gray-light {
        background-color: #f7f7f7;
    }
    .bg-black {
        background-color: #111111 !important;
    }
    .bg-red,
    .callout.callout-danger,
    .alert-danger,
    .alert-error,
    .label-danger,
    .modal-danger .modal-body {
        background-color: #dd4b39 !important;
    }
    .bg-yellow,
    .callout.callout-warning,
    .alert-warning,
    .label-warning,
    .modal-warning .modal-body {
        background-color: #f39c12 !important;
    }
    .bg-aqua,
    .callout.callout-info,
    .alert-info,
    .label-info,
    .modal-info .modal-body {
        background-color: #00c0ef !important;
    }
    .bg-blue {
        background-color: #0073b7 !important;
    }
    .bg-light-blue,
    .label-primary,
    .modal-primary .modal-body {
        background-color: #3c8dbc !important;
    }
    .bg-green,
    .callout.callout-success,
    .alert-success,
    .label-success,
    .modal-success .modal-body {
        background-color: #00a65a !important;
    }
    .bg-navy {
        background-color: #001f3f !important;
    }
    .bg-teal {
        background-color: #39cccc !important;
    }
    .bg-olive {
        background-color: #3d9970 !important;
    }
    .bg-lime {
        background-color: #01ff70 !important;
    }
    .bg-orange {
        background-color: #ff851b !important;
    }
    .bg-fuchsia {
        background-color: #f012be !important;
    }
    .bg-purple {
        background-color: #605ca8 !important;
    }
    .bg-maroon {
        background-color: #d81b60 !important;
    }
    .bg-gray-active {
        color: #000;
        background-color: #b5bbc8 !important;
    }
    .bg-black-active {
        background-color: #000000 !important;
    }
    .bg-red-active,
    .modal-danger .modal-header,
    .modal-danger .modal-footer {
        background-color: #d33724 !important;
    }
    .bg-yellow-active,
    .modal-warning .modal-header,
    .modal-warning .modal-footer {
        background-color: #db8b0b !important;
    }
    .bg-aqua-active,
    .modal-info .modal-header,
    .modal-info .modal-footer {
        background-color: #00a7d0 !important;
    }
    .bg-blue-active {
        background-color: #005384 !important;
    }
    .bg-light-blue-active,
    .modal-primary .modal-header,
    .modal-primary .modal-footer {
        background-color: #357ca5 !important;
    }
    .bg-green-active,
    .modal-success .modal-header,
    .modal-success .modal-footer {
        background-color: #008d4c !important;
    }
    .bg-navy-active {
        background-color: #001a35 !important;
    }
    .bg-teal-active {
        background-color: #30bbbb !important;
    }
    .bg-olive-active {
        background-color: #368763 !important;
    }
    .bg-lime-active {
        background-color: #00e765 !important;
    }
    .bg-orange-active {
        background-color: #ff7701 !important;
    }
    .bg-fuchsia-active {
        background-color: #db0ead !important;
    }
    .bg-purple-active {
        background-color: #555299 !important;
    }
    .bg-maroon-active {
        background-color: #ca195a !important;
    }
    [class^="bg-"].disabled {
        opacity: 0.65;
        filter: alpha(opacity=65);
    }
    .text-red {
        color: #dd4b39 !important;
    }
    .text-yellow {
        color: #f39c12 !important;
    }
    .text-aqua {
        color: #00c0ef !important;
    }
    .text-blue {
        color: #0073b7 !important;
    }
    .text-black {
        color: #111111 !important;
    }
    .text-light-blue {
        color: #3c8dbc !important;
    }
    .text-green {
        color: #00a65a !important;
    }
    .text-gray {
        color: #d2d6de !important;
    }
    .text-navy {
        color: #001f3f !important;
    }
    .text-teal {
        color: #39cccc !important;
    }
    .text-olive {
        color: #3d9970 !important;
    }
    .text-lime {
        color: #01ff70 !important;
    }
    .text-orange {
        color: #ff851b !important;
    }
    .text-fuchsia {
        color: #f012be !important;
    }
    .text-purple {
        color: #605ca8 !important;
    }
    .text-maroon {
        color: #d81b60 !important;
    }
    .link-muted {
        color: #7a869d;
    }
    .link-muted:hover,
    .link-muted:focus {
        color: #606c84;
    }
    .link-black {
        color: #666;
    }
    .link-black:hover,
    .link-black:focus {
        color: #999;
    }
    .hide {
        display: none !important;
    }
    .no-border {
        border: 0 !important;
    }
    .no-padding {
        padding: 0 !important;
    }
    .no-margin {
        margin: 0 !important;
    }
    .no-shadow {
        box-shadow: none !important;
    }
    .list-unstyled,
    .chart-legend,
    .contacts-list,
    .users-list,
    .mailbox-attachments {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .list-group-unbordered > .list-group-item {
        border-left: 0;
        border-right: 0;
        border-radius: 0;
        padding-left: 0;
        padding-right: 0;
    }
    .flat {
        border-radius: 0 !important;
    }
    .text-bold,
    .text-bold.table td,
    .text-bold.table th {
        font-weight: 700;
    }
    .text-sm {
        font-size: 12px;
    }
    .jqstooltip {
        padding: 5px !important;
        width: auto !important;
        height: auto !important;
    }
    .bg-teal-gradient {
        background: #39cccc !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #39cccc), color-stop(1, #7adddd)) !important;
        background: -ms-linear-gradient(bottom, #39cccc, #7adddd) !important;
        background: -moz-linear-gradient(center bottom, #39cccc 0%, #7adddd 100%) !important;
        background: -o-linear-gradient(#7adddd, #39cccc) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7adddd', endColorstr='#39cccc', GradientType=0) !important;
        color: #fff;
    }
    .bg-light-blue-gradient {
        background: #3c8dbc !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #3c8dbc), color-stop(1, #67a8ce)) !important;
        background: -ms-linear-gradient(bottom, #3c8dbc, #67a8ce) !important;
        background: -moz-linear-gradient(center bottom, #3c8dbc 0%, #67a8ce 100%) !important;
        background: -o-linear-gradient(#67a8ce, #3c8dbc) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#67a8ce', endColorstr='#3c8dbc', GradientType=0) !important;
        color: #fff;
    }
    .bg-blue-gradient {
        background: #0073b7 !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #0073b7), color-stop(1, #0089db)) !important;
        background: -ms-linear-gradient(bottom, #0073b7, #0089db) !important;
        background: -moz-linear-gradient(center bottom, #0073b7 0%, #0089db 100%) !important;
        background: -o-linear-gradient(#0089db, #0073b7) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0089db', endColorstr='#0073b7', GradientType=0) !important;
        color: #fff;
    }
    .bg-aqua-gradient {
        background: #00c0ef !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #00c0ef), color-stop(1, #14d1ff)) !important;
        background: -ms-linear-gradient(bottom, #00c0ef, #14d1ff) !important;
        background: -moz-linear-gradient(center bottom, #00c0ef 0%, #14d1ff 100%) !important;
        background: -o-linear-gradient(#14d1ff, #00c0ef) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#14d1ff', endColorstr='#00c0ef', GradientType=0) !important;
        color: #fff;
    }
    .bg-yellow-gradient {
        background: #f39c12 !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #f39c12), color-stop(1, #f7bc60)) !important;
        background: -ms-linear-gradient(bottom, #f39c12, #f7bc60) !important;
        background: -moz-linear-gradient(center bottom, #f39c12 0%, #f7bc60 100%) !important;
        background: -o-linear-gradient(#f7bc60, #f39c12) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7bc60', endColorstr='#f39c12', GradientType=0) !important;
        color: #fff;
    }
    .bg-purple-gradient {
        background: #605ca8 !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #605ca8), color-stop(1, #9491c4)) !important;
        background: -ms-linear-gradient(bottom, #605ca8, #9491c4) !important;
        background: -moz-linear-gradient(center bottom, #605ca8 0%, #9491c4 100%) !important;
        background: -o-linear-gradient(#9491c4, #605ca8) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#9491c4', endColorstr='#605ca8', GradientType=0) !important;
        color: #fff;
    }
    .bg-green-gradient {
        background: #00a65a !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #00a65a), color-stop(1, #00ca6d)) !important;
        background: -ms-linear-gradient(bottom, #00a65a, #00ca6d) !important;
        background: -moz-linear-gradient(center bottom, #00a65a 0%, #00ca6d 100%) !important;
        background: -o-linear-gradient(#00ca6d, #00a65a) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00ca6d', endColorstr='#00a65a', GradientType=0) !important;
        color: #fff;
    }
    .bg-red-gradient {
        background: #dd4b39 !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #dd4b39), color-stop(1, #e47365)) !important;
        background: -ms-linear-gradient(bottom, #dd4b39, #e47365) !important;
        background: -moz-linear-gradient(center bottom, #dd4b39 0%, #e47365 100%) !important;
        background: -o-linear-gradient(#e47365, #dd4b39) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e47365', endColorstr='#dd4b39', GradientType=0) !important;
        color: #fff;
    }
    .bg-black-gradient {
        background: #111111 !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #111111), color-stop(1, #2b2b2b)) !important;
        background: -ms-linear-gradient(bottom, #111111, #2b2b2b) !important;
        background: -moz-linear-gradient(center bottom, #111111 0%, #2b2b2b 100%) !important;
        background: -o-linear-gradient(#2b2b2b, #111111) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2b2b2b', endColorstr='#111111', GradientType=0) !important;
        color: #fff;
    }
    .bg-maroon-gradient {
        background: #d81b60 !important;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #d81b60), color-stop(1, #e73f7c)) !important;
        background: -ms-linear-gradient(bottom, #d81b60, #e73f7c) !important;
        background: -moz-linear-gradient(center bottom, #d81b60 0%, #e73f7c 100%) !important;
        background: -o-linear-gradient(#e73f7c, #d81b60) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e73f7c', endColorstr='#d81b60', GradientType=0) !important;
        color: #fff;
    }
    .description-block .description-icon {
        font-size: 16px;
    }
    .no-pad-top {
        padding-top: 0;
    }
    .position-static {
        position: static !important;
    }
    .list-header {
        font-size: 15px;
        padding: 10px 4px;
        font-weight: bold;
        color: #666;
    }
    .list-seperator {
        height: 1px;
        background: #f4f4f4;
        margin: 15px 0 9px 0;
    }
    .list-link > a {
        padding: 4px;
        color: #777;
    }
    .list-link > a:hover {
        color: #222;
    }
    .font-light {
        font-weight: 300;
    }
    .user-block:before,
    .user-block:after {
        content: " ";
        display: table;
    }
    .user-block:after {
        clear: both;
    }
    .user-block img {
        width: 40px;
        height: 40px;
        float: left;
    }
    .user-block .username,
    .user-block .description,
    .user-block .comment {
        display: block;
        margin-left: 50px;
    }
    .user-block .username {
        font-size: 16px;
        font-weight: 600;
    }
    .user-block .description {
        color: #999;
        font-size: 13px;
    }
    .user-block.user-block-sm .username,
    .user-block.user-block-sm .description,
    .user-block.user-block-sm .comment {
        margin-left: 40px;
    }
    .user-block.user-block-sm .username {
        font-size: 14px;
    }
    .img-sm,
    .img-md,
    .img-lg,
    .box-comments .box-comment img,
    .user-block.user-block-sm img {
        float: left;
    }
    .img-sm,
    .box-comments .box-comment img,
    .user-block.user-block-sm img {
        width: 30px !important;
        height: 30px !important;
    }
    .img-sm + .img-push {
        margin-left: 40px;
    }
    .img-md {
        width: 60px;
        height: 60px;
    }
    .img-md + .img-push {
        margin-left: 70px;
    }
    .img-lg {
        width: 100px;
        height: 100px;
    }
    .img-lg + .img-push {
        margin-left: 110px;
    }
    .img-bordered {
        border: 3px solid #d2d6de;
        padding: 3px;
    }
    .img-bordered-sm {
        border: 2px solid #d2d6de;
        padding: 2px;
    }
    .attachment-block {
        border: 1px solid #f4f4f4;
        padding: 5px;
        margin-bottom: 10px;
        background: #f7f7f7;
    }
    .attachment-block .attachment-img {
        max-width: 100px;
        max-height: 100px;
        height: auto;
        float: left;
    }
    .attachment-block .attachment-pushed {
        margin-left: 110px;
    }
    .attachment-block .attachment-heading {
        margin: 0;
    }
    .attachment-block .attachment-text {
        color: #555;
    }
    .connectedSortable {
        min-height: 100px;
    }
    .ui-helper-hidden-accessible {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }
    .sort-highlight {
        background: #f4f4f4;
        border: 1px dashed #ddd;
        margin-bottom: 10px;
    }
    .full-opacity-hover {
        opacity: 0.65;
        filter: alpha(opacity=65);
    }
    .full-opacity-hover:hover {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    .chart {
        position: relative;
        overflow: hidden;
        width: 100%;
    }
    .chart svg,
    .chart canvas {
        width: 100% !important;
    }
    /*
 * Misc: print
 * -----------
 */
    @media print {
        .no-print,
        .main-sidebar,
        .left-side,
        .main-header,
        .content-header {
            display: none !important;
        }
        .content-wrapper,
        .right-side,
        .main-footer {
            margin-left: 0 !important;
            min-height: 0 !important;
            -webkit-transform: translate(0, 0) !important;
            -ms-transform: translate(0, 0) !important;
            -o-transform: translate(0, 0) !important;
            transform: translate(0, 0) !important;
        }
        .fixed .content-wrapper,
        .fixed .right-side {
            padding-top: 0 !important;
        }
        .invoice {
            width: 100%;
            border: 0;
            margin: 0;
            padding: 0;
        }
        .invoice-col {
            float: left;
            width: 33.3333333%;
        }
        .table-responsive {
            overflow: auto;
        }
        .table-responsive > .table tr th,
        .table-responsive > .table tr td {
            white-space: normal !important;
        }
    }


    div.dataTables_length label {
        font-weight: normal;
        text-align: left;
        white-space: nowrap;
    }

    div.dataTables_length select {
        width: 75px;
        display: inline-block;
    }

    div.dataTables_filter {
        text-align: right;
    }

    div.dataTables_filter label {
        font-weight: normal;
        white-space: nowrap;
        text-align: left;
    }

    div.dataTables_filter input {
        margin-left: 0.5em;
        display: inline-block;
        width: auto;
    }

    div.dataTables_info {
        padding-top: 8px;
        white-space: nowrap;
    }

    div.dataTables_paginate {
        margin: 0;
        white-space: nowrap;
        text-align: right;
    }

    div.dataTables_paginate ul.pagination {
        margin: 2px 0;
        white-space: nowrap;
    }

    @media screen and (max-width: 767px) {
        div.dataTables_wrapper > div.row > div,
        div.dataTables_length,
        div.dataTables_filter,
        div.dataTables_info,
        div.dataTables_paginate {
            text-align: center;
        }

        div.DTTT {
            margin-bottom: 0.5em;
        }
    }

    table.dataTable td,
    table.dataTable th {
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
    }

    table.dataTable {
        clear: both;
        margin-top: 6px !important;
        margin-bottom: 6px !important;
        max-width: none !important;
    }

    table.dataTable thead .sorting,
    table.dataTable thead .sorting_asc,
    table.dataTable thead .sorting_desc,
    table.dataTable thead .sorting_asc_disabled,
    table.dataTable thead .sorting_desc_disabled {
        cursor: pointer;
        position: relative;
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_desc:after {
        position: absolute;
        top: 8px;
        right: 8px;
        display: block;
        font-family: 'Glyphicons Halflings';
        opacity: 0.5;
    }
    table.dataTable thead .sorting:after {
        opacity: 0.2;
        content: "\e150"; /* sort */
    }
    table.dataTable thead .sorting_asc:after {
        content: "\e155"; /* sort-by-attributes */
    }
    table.dataTable thead .sorting_desc:after {
        content: "\e156"; /* sort-by-attributes-alt */
    }
    div.dataTables_scrollBody table.dataTable thead .sorting:after,
    div.dataTables_scrollBody table.dataTable thead .sorting_asc:after,
    div.dataTables_scrollBody table.dataTable thead .sorting_desc:after {
        display: none;
    }

    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:after {
        color: #eee;
    }

    table.dataTable thead > tr > th {
        padding-right: 30px;
    }

    table.dataTable th:active {
        outline: none;
    }

    /* Condensed */
    table.dataTable.table-condensed thead > tr > th {
        padding-right: 20px;
    }

    table.dataTable.table-condensed thead .sorting:after,
    table.dataTable.table-condensed thead .sorting_asc:after,
    table.dataTable.table-condensed thead .sorting_desc:after {
        top: 6px;
        right: 6px;
    }

    /* Scrolling */
    div.dataTables_scrollHead table {
        margin-bottom: 0 !important;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    div.dataTables_scrollHead table thead tr:last-child th:first-child,
    div.dataTables_scrollHead table thead tr:last-child td:first-child {
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }

    div.dataTables_scrollBody table {
        border-top: none;
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    div.dataTables_scrollBody tbody tr:first-child th,
    div.dataTables_scrollBody tbody tr:first-child td {
        border-top: none;
    }

    div.dataTables_scrollFoot table {
        margin-top: 0 !important;
        border-top: none;
    }

    /* Frustratingly the border-collapse:collapse used by Bootstrap makes the column
   width calculations when using scrolling impossible to align columns. We have
   to use separate
 */
    table.table-bordered.dataTable {
        border-collapse: separate !important;
    }
    table.table-bordered thead th,
    table.table-bordered thead td {
        border-left-width: 0;
        border-top-width: 0;
    }
    table.table-bordered tbody th,
    table.table-bordered tbody td {
        border-left-width: 0;
        border-bottom-width: 0;
    }
    table.table-bordered tfoot th,
    table.table-bordered tfoot td {
        border-left-width: 0;
        border-bottom-width: 0;
    }
    table.table-bordered th:last-child,
    table.table-bordered td:last-child {
        border-right-width: 0;
    }
    div.dataTables_scrollHead table.table-bordered {
        border-bottom-width: 0;
    }

    /*
 * TableTools styles
 */
    .table.dataTable tbody tr.active td,
    .table.dataTable tbody tr.active th {
        background-color: #08C;
        color: white;
    }

    .table.dataTable tbody tr.active:hover td,
    .table.dataTable tbody tr.active:hover th {
        background-color: #0075b0 !important;
    }

    .table.dataTable tbody tr.active th > a,
    .table.dataTable tbody tr.active td > a {
        color: white;
    }

    .table-striped.dataTable tbody tr.active:nth-child(odd) td,
    .table-striped.dataTable tbody tr.active:nth-child(odd) th {
        background-color: #017ebc;
    }

    table.DTTT_selectable tbody tr {
        cursor: pointer;
    }

    div.DTTT .btn:hover {
        text-decoration: none !important;
    }

    ul.DTTT_dropdown.dropdown-menu {
        z-index: 2003;
    }

    ul.DTTT_dropdown.dropdown-menu a {
        color: #333 !important; /* needed only when demo_page.css is included */
    }

    ul.DTTT_dropdown.dropdown-menu li {
        position: relative;
    }

    ul.DTTT_dropdown.dropdown-menu li:hover a {
        background-color: #0088cc;
        color: white !important;
    }

    div.DTTT_collection_background {
        z-index: 2002;
    }

    /* TableTools information display */
    div.DTTT_print_info {
        position: fixed;
        top: 50%;
        left: 50%;
        width: 400px;
        height: 150px;
        margin-left: -200px;
        margin-top: -75px;
        text-align: center;
        color: #333;
        padding: 10px 30px;
        opacity: 0.95;

        background-color: white;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 6px;

        -webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.5);
        box-shadow: 0 3px 7px rgba(0, 0, 0, 0.5);
    }

    div.DTTT_print_info h6 {
        font-weight: normal;
        font-size: 28px;
        line-height: 28px;
        margin: 1em;
    }

    div.DTTT_print_info p {
        font-size: 14px;
        line-height: 20px;
    }

    div.dataTables_processing {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 60px;
        margin-left: -50%;
        margin-top: -25px;
        padding-top: 20px;
        padding-bottom: 20px;
        text-align: center;
        font-size: 1.2em;
        background-color: white;
        background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(255, 255, 255, 0)), color-stop(25%, rgba(255, 255, 255, 0.9)), color-stop(75%, rgba(255, 255, 255, 0.9)), color-stop(100%, rgba(255, 255, 255, 0)));
        background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
        background: -moz-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
        background: -ms-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
        background: -o-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
    }

    /*
 * FixedColumns styles
 */
    div.DTFC_LeftHeadWrapper table,
    div.DTFC_LeftFootWrapper table,
    div.DTFC_RightHeadWrapper table,
    div.DTFC_RightFootWrapper table,
    table.DTFC_Cloned tr.even {
        background-color: white;
        margin-bottom: 0;
    }

    div.DTFC_RightHeadWrapper table,
    div.DTFC_LeftHeadWrapper table {
        border-bottom: none !important;
        margin-bottom: 0 !important;
        border-top-right-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }

    div.DTFC_RightHeadWrapper table thead tr:last-child th:first-child,
    div.DTFC_RightHeadWrapper table thead tr:last-child td:first-child,
    div.DTFC_LeftHeadWrapper table thead tr:last-child th:first-child,
    div.DTFC_LeftHeadWrapper table thead tr:last-child td:first-child {
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }

    div.DTFC_RightBodyWrapper table,
    div.DTFC_LeftBodyWrapper table {
        border-top: none;
        margin: 0 !important;
    }

    div.DTFC_RightBodyWrapper tbody tr:first-child th,
    div.DTFC_RightBodyWrapper tbody tr:first-child td,
    div.DTFC_LeftBodyWrapper tbody tr:first-child th,
    div.DTFC_LeftBodyWrapper tbody tr:first-child td {
        border-top: none;
    }

    div.DTFC_RightFootWrapper table,
    div.DTFC_LeftFootWrapper table {
        border-top: none;
        margin-top: 0 !important;
    }

    div.DTFC_LeftBodyWrapper table.dataTable thead .sorting:after,
    div.DTFC_LeftBodyWrapper table.dataTable thead .sorting_asc:after,
    div.DTFC_LeftBodyWrapper table.dataTable thead .sorting_desc:after,
    div.DTFC_RightBodyWrapper table.dataTable thead .sorting:after,
    div.DTFC_RightBodyWrapper table.dataTable thead .sorting_asc:after,
    div.DTFC_RightBodyWrapper table.dataTable thead .sorting_desc:after {
        display: none;
    }

    /*
 * FixedHeader styles
 */
    div.FixedHeader_Cloned table {
        margin: 0 !important
    }

    /* Z-INDEX */

    /* iCheck plugin skins
----------------------------------- */
    @import url("minimal/_all.css");
    /*
@import url("minimal/minimal.css");
@import url("minimal/red.css");
@import url("minimal/green.css");
@import url("minimal/blue.css");
@import url("minimal/aero.css");
@import url("minimal/grey.css");
@import url("minimal/orange.css");
@import url("minimal/yellow.css");
@import url("minimal/pink.css");
@import url("minimal/purple.css");
*/

    @import url("square/_all.css");
    /*
@import url("square/square.css");
@import url("square/red.css");
@import url("square/green.css");
@import url("square/blue.css");
@import url("square/aero.css");
@import url("square/grey.css");
@import url("square/orange.css");
@import url("square/yellow.css");
@import url("square/pink.css");
@import url("square/purple.css");
*/

    @import url("flat/_all.css");
    /*
@import url("flat/flat.css");
@import url("flat/red.css");
@import url("flat/green.css");
@import url("flat/blue.css");
@import url("flat/aero.css");
@import url("flat/grey.css");
@import url("flat/orange.css");
@import url("flat/yellow.css");
@import url("flat/pink.css");
@import url("flat/purple.css");
*/

    @import url("line/_all.css");
    /*
@import url("line/line.css");
@import url("line/red.css");
@import url("line/green.css");
@import url("line/blue.css");
@import url("line/aero.css");
@import url("line/grey.css");
@import url("line/orange.css");
@import url("line/yellow.css");
@import url("line/pink.css");
@import url("line/purple.css");
*/


    .input-group.date .input-group-addon {
        cursor: pointer;
    }
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
    }



    table {
        border-collapse: collapse;
    }
    table td {
        padding: 0px 5px;

    }

</style>
@section('head-title')
    {{"Declaration Print"}}
@endsection
@section('title-left')

@endsection
@section('title')
    @parent

@endsection
@section('title-right')

@endsection
@section('top')

@endsection
@section('content-top')
    <table class="table-condensed" width="100%">
        <tr>
            <td align="right" style="vertical-align: center">
                <img src="{{public_path().'/projects/health-declaration/logo/GoB.png'}}" width="70px"/>
            </td>
            <td align="center" style="vertical-align: middle">
                <h3>Government of the People's Republic of Bangladesh</h3>
                <h3>Ministry of Health & Family Welfare</h3>
            </td>
            <td align="left" style="vertical-align: center">
                <img src="{{public_path().'/projects/health-declaration/logo/dghs.jpg'}}" width="70px"/>
            </td>
        </tr>
    </table>
@endsection
@section('content')
    <h4 align="center">Health Declaration Card</h4>

    <div class="col-md-12 no-padding no-margin" style="width: 200px; vertical-align: center">
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($content)) !!} "
             alt="{{$content}}">
    </div>

    <div class="clearfix"></div>
    @if($declaration->decision=='You are Allowed to Travel')
        <h4 style="color:green;"> Decision: {{$declaration->decision}}. {!! "&#10003" !!}</h4>
        <div class="clearfix"></div>
        @if(((isset($declaration->have_covid_symptoms) && $declaration->have_covid_symptoms)) || (isset($declaration->have_monkey_pox_symptoms) && $declaration->have_monkey_pox_symptoms))
            <h4 style="color:red;">After coming to Bangladesh please contact with Health Desk Before Immigration</h4>
            <h4 style="color:red;font-family:solaiman-lipi">বাংলাদেশে আসার পর ইমিগ্রেশনের আগে হেলথ ডেস্কের সাথে যোগাযোগ করুন</h4>
        @endif
    @else
        <h4 style="color:red;"> Decision: {{$declaration->decision}}. {!! "&#10060" !!}</h4>
    @endif

    <h4>Personal Information</h4>
    <table class="table table-bordered no-padding" width="100%">
        <tr>
            <td>Name</td>
            <td>{{$declaration->passenger_name}}</td>
            <td>Gender</td>
            <td>{{$declaration->gender}}</td>
        </tr>
        <tr>
            <td>Passport No</td>
            <td>{{$declaration->passport_no}}</td>
            <td>Nationality</td>
            <td>{{$declaration->nationality}}</td>
        </tr>
        <tr>
            <td>Mode of Transportation</td>
            <td>{{ucwords($declaration->mode_of_transport)}}</td>
            <td>Visiting From</td>
            <td>{{$declaration->journey_from_country_name}}</td>
        </tr>
        <tr>
            <td>Arrival Date</td>
            <td>{{formatDate($declaration->arrival_date)}}</td>
            <td>Staying At</td>
            <td>{{$declaration->division_name." , ".$declaration->district_name}}</td>
        </tr>
    </table>
    <h4>Covid Information</h4>
    <table class="table table-bordered no-padding" width="100%">
        <tr>
            <td>Has COVID-19 Vaccination</td>
            <td>{!!formatBoolean($declaration->is_vaccinated)!!}</td>
        </tr>

        <tr>
            <td>Negative In RT-PCR test in last 72 hours?</td>
            <td>{!!formatBoolean($declaration->is_rt_pcr_negative)!!}</td>
            <td>Declaration Created at</td>
            <td>{{formatDateTime($declaration->created_at)}}</td>
        </tr>

    </table>

@endsection
@section('content-bottom')

    <h4>Please carry all necessary documents (Vaccination Certificate/Covid-19 Test Result) with this card.</h4>
    <h4 style="color:red;font-family:solaiman-lipi">অনুগ্রহ করে এই কার্ডের সাথে সমস্ত প্রয়োজনীয় কাগজপত্র (টিকাকরণ শংসাপত্র/কোভিড-১৯ পরীক্ষার ফলাফল) সঙ্গে
        রাখুন।</h4>

@endsection

@section('js')
    <script type="text/javascript">

    </script>
@show