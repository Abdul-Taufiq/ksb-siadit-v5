<style>
    :root {
        --bs-blue: #0d6efd;
        --bs-indigo: #6610f2;
        --bs-purple: #6f42c1;
        --bs-pink: #d63384;
        --bs-red: #dc3545;
        --bs-orange: #fd7e14;
        --bs-yellow: #ffc107;
        --bs-green: #198754;
        --bs-teal: #20c997;
        --bs-cyan: #0dcaf0;
        --bs-black: #000;
        --bs-white: #fff;
        --bs-gray: #6c757d;
        --bs-gray-dark: #343a40;
        --bs-gray-100: #f8f9fa;
        --bs-gray-200: #e9ecef;
        --bs-gray-300: #dee2e6;
        --bs-gray-400: #ced4da;
        --bs-gray-500: #adb5bd;
        --bs-gray-600: #6c757d;
        --bs-gray-700: #495057;
        --bs-gray-800: #343a40;
        --bs-gray-900: #212529;
        --bs-primary: #0d6efd;
        --bs-secondary: #6c757d;
        --bs-success: #198754;
        --bs-info: #0dcaf0;
        --bs-warning: #ffc107;
        --bs-danger: #dc3545;
        --bs-light: #f8f9fa;
        --bs-dark: #212529;
        --bs-primary-rgb: 13, 110, 253;
        --bs-secondary-rgb: 108, 117, 125;
        --bs-success-rgb: 25, 135, 84;
        --bs-info-rgb: 13, 202, 240;
        --bs-warning-rgb: 255, 193, 7;
        --bs-danger-rgb: 220, 53, 69;
        --bs-light-rgb: 248, 249, 250;
        --bs-dark-rgb: 33, 37, 41;
        --bs-white-rgb: 255, 255, 255;
        --bs-black-rgb: 0, 0, 0;
        --bs-body-color-rgb: 33, 37, 41;
        --bs-body-bg-rgb: 255, 255, 255;
        --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
        --bs-body-font-family: var(--bs-font-sans-serif);
        --bs-body-font-size: 1rem;
        --bs-body-font-weight: 400;
        --bs-body-line-height: 1.5;
        --bs-body-color: #212529;
        --bs-body-bg: #fff;
        --bs-border-width: 1px;
        --bs-border-style: solid;
        --bs-border-color: #dee2e6;
        --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
        --bs-border-radius: 0.375rem;
        --bs-border-radius-sm: 0.25rem;
        --bs-border-radius-lg: 0.5rem;
        --bs-border-radius-xl: 1rem;
        --bs-border-radius-2xl: 2rem;
        --bs-border-radius-pill: 50rem;
        --bs-link-color: #0d6efd;
        --bs-link-hover-color: #0a58ca;
        --bs-code-color: #d63384;
        --bs-highlight-bg: #fff3cd;
    }

    * {
        margin: 0px;
        padding: 0px;
    }

    .w-25 {
        width: 25% !important;
    }

    .w-50 {
        width: 50% !important;
    }

    .w-75 {
        width: 75% !important;
    }

    .w-100 {
        width: 100% !important;
    }


    h7,
    .h7,
    h6,
    .h6,
    h5,
    .h5,
    h4,
    .h4,
    h3,
    .h3,
    h2,
    .h2,
    h1,
    .h1 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
    }

    h6,
    .h6 {
        font-size: 1rem;
    }


    .text-start {
        text-align: left !important;
    }

    .text-end {
        text-align: right !important;
    }

    .text-center {
        text-align: center !important;
    }

    .text-decoration-none {
        text-decoration: none !important;
    }

    .text-decoration-underline {
        text-decoration: underline !important;
    }

    .text-decoration-line-through {
        text-decoration: line-through !important;
    }

    .text-lowercase {
        text-transform: lowercase !important;
    }

    .text-uppercase {
        text-transform: uppercase !important;
    }

    .text-capitalize {
        text-transform: capitalize !important;
    }

    .text-wrap {
        white-space: normal !important;
    }

    .text-nowrap {
        white-space: nowrap !important;
    }


    .m-0 {
        margin: 0 !important;
    }

    .m-1 {
        margin: 0.25rem !important;
    }

    .m-2 {
        margin: 0.5rem !important;
    }

    .m-3 {
        margin: 1rem !important;
    }

    .m-4 {
        margin: 1.5rem !important;
    }

    .m-5 {
        margin: 3rem !important;
    }

    .m-auto {
        margin: auto !important;
    }

    .mx-0 {
        margin-right: 0 !important;
        margin-left: 0 !important;
    }

    .mx-1 {
        margin-right: 0.25rem !important;
        margin-left: 0.25rem !important;
    }

    .mx-2 {
        margin-right: 0.5rem !important;
        margin-left: 0.5rem !important;
    }

    .mx-3 {
        margin-right: 1rem !important;
        margin-left: 1rem !important;
    }

    .mx-4 {
        margin-right: 1.5rem !important;
        margin-left: 1.5rem !important;
    }

    .mx-5 {
        margin-right: 3rem !important;
        margin-left: 3rem !important;
    }

    .mx-auto {
        margin-right: auto !important;
        margin-left: auto !important;
    }

    .my-0 {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    .my-1 {
        margin-top: 0.25rem !important;
        margin-bottom: 0.25rem !important;
    }

    .my-2 {
        margin-top: 0.5rem !important;
        margin-bottom: 0.5rem !important;
    }

    .my-3 {
        margin-top: 1rem !important;
        margin-bottom: 1rem !important;
    }

    .my-4 {
        margin-top: 1.5rem !important;
        margin-bottom: 1.5rem !important;
    }

    .my-5 {
        margin-top: 3rem !important;
        margin-bottom: 3rem !important;
    }

    .my-auto {
        margin-top: auto !important;
        margin-bottom: auto !important;
    }

    .mt-0 {
        margin-top: 0 !important;
    }

    .mt-1 {
        margin-top: 0.25rem !important;
    }

    .mt-2 {
        margin-top: 0.5rem !important;
    }

    .mt-3 {
        margin-top: 1rem !important;
    }

    .mt-4 {
        margin-top: 1.5rem !important;
    }

    .mt-5 {
        margin-top: 3rem !important;
    }

    .mt-auto {
        margin-top: auto !important;
    }

    .me-0 {
        margin-right: 0 !important;
    }

    .me-1 {
        margin-right: 0.25rem !important;
    }

    .me-2 {
        margin-right: 0.5rem !important;
    }

    .me-3 {
        margin-right: 1rem !important;
    }

    .me-4 {
        margin-right: 1.5rem !important;
    }

    .me-5 {
        margin-right: 3rem !important;
    }


    .mb-0 {
        margin-bottom: 0 !important;
    }

    .mb-1 {
        margin-bottom: 0.25rem !important;
    }

    .mb-2 {
        margin-bottom: 0.5rem !important;
    }

    .mb-3 {
        margin-bottom: 1rem !important;
    }

    .mb-4 {
        margin-bottom: 1.5rem !important;
    }

    .mb-5 {
        margin-bottom: 3rem !important;
    }

    .mb-auto {
        margin-bottom: auto !important;
    }


    .p-0 {
        padding: 0 !important;
    }

    .p-1 {
        padding: 0.25rem !important;
    }

    .p-2 {
        padding: 0.02rem !important;
    }

    .p-3 {
        padding: 1rem !important;
    }

    .p-4 {
        padding: 1.5rem !important;
    }

    .p-5 {
        padding: 3rem !important;
    }

    .px-0 {
        padding-right: 0 !important;
        padding-left: 0 !important;
    }

    .px-1 {
        padding-right: 0.25rem !important;
        padding-left: 0.25rem !important;
    }

    .px-2 {
        padding-right: 0.5rem !important;
        padding-left: 0.5rem !important;
    }

    .px-3 {
        padding-right: 1rem !important;
        padding-left: 1rem !important;
    }

    .px-4 {
        padding-right: 1.5rem !important;
        padding-left: 1.5rem !important;
    }

    .px-5 {
        padding-right: 3rem !important;
        padding-left: 3rem !important;
    }

    .py-0 {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }

    .py-1 {
        padding-top: 0.25rem !important;
        padding-bottom: 0.25rem !important;
    }

    .py-2 {
        padding-top: 0.5rem !important;
        padding-bottom: 0.5rem !important;
    }

    .py-3 {
        padding-top: 1rem !important;
        padding-bottom: 1rem !important;
    }

    .py-4 {
        padding-top: 1.5rem !important;
        padding-bottom: 1.5rem !important;
    }

    .py-5 {
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }

    .pt-0 {
        padding-top: 0 !important;
    }

    .pt-1 {
        padding-top: 0.25rem !important;
    }

    .pt-2 {
        padding-top: 0.5rem !important;
    }

    .pt-3 {
        padding-top: 1rem !important;
    }

    .pt-4 {
        padding-top: 1.5rem !important;
    }

    .pt-5 {
        padding-top: 3rem !important;
    }

    .pe-0 {
        padding-right: 0 !important;
    }

    .pe-1 {
        padding-right: 0.25rem !important;
    }

    .pe-2 {
        padding-right: 0.5rem !important;
    }

    .pe-3 {
        padding-right: 1rem !important;
    }

    .pe-4 {
        padding-right: 1.5rem !important;
    }

    .pe-5 {
        padding-right: 3rem !important;
    }

    .pb-0 {
        padding-bottom: 0 !important;
    }

    .pb-1 {
        padding-bottom: 0.25rem !important;
    }

    .pb-2 {
        padding-bottom: 0.5rem !important;
    }

    .pb-3 {
        padding-bottom: 1rem !important;
    }

    .pb-4 {
        padding-bottom: 1.5rem !important;
    }

    .pb-5 {
        padding-bottom: 3rem !important;
    }

    .card {
        --bs-card-spacer-y: 0.5rem;
        --bs-card-spacer-x: 0.5rem;
        --bs-card-title-spacer-y: 0.5rem;
        --bs-card-border-width: 1px;
        --bs-card-border-color: var(--bs-border-color-translucent);
        --bs-card-border-radius: 0.375rem;
        --bs-card-box-shadow: ;
        --bs-card-inner-border-radius: calc(0.375rem - 1px);
        --bs-card-cap-padding-y: 0.2rem;
        --bs-card-cap-padding-x: 1rem;
        --bs-card-cap-bg: rgba(0, 0, 0, 0.03);
        --bs-card-cap-color: ;
        --bs-card-height: ;
        --bs-card-color: ;
        --bs-card-bg: #fff;
        --bs-card-img-overlay-padding: 1rem;
        --bs-card-group-margin: 0.75rem;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        height: var(--bs-card-height);
        word-wrap: break-word;
        background-color: var(--bs-card-bg);
        background-clip: border-box;
        border: var(--bs-card-border-width) solid var(--bs-card-border-color);
        border-radius: var(--bs-card-border-radius);
    }

    .card>hr {
        margin-right: 0;
        margin-left: 0;
    }

    .card>.card-header+.list-group,
    .card>.list-group+.card-footer {
        border-top: 0;
    }

    .card-body {
        flex: 1 1 auto;
        padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
        color: var(--bs-card-color);
    }

    .card-title {
        margin-bottom: var(--bs-card-title-spacer-y);
    }

    .card-subtitle {
        margin-top: calc(-0.5 * var(--bs-card-title-spacer-y));
        margin-bottom: 0;
    }

    .card-text:last-child {
        margin-bottom: 0;
    }

    .card-link+.card-link {
        margin-left: var(--bs-card-spacer-x);
    }

    .card-header {
        padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
        margin-bottom: 0;
        color: var(--bs-card-cap-color);
        background-color: var(--bs-card-cap-bg);
        border-bottom: var(--bs-card-border-width) solid var(--bs-card-border-color);
    }

    .card-header:first-child {
        border-radius: var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius) 0 0;
    }

    .card-footer {
        padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
        color: var(--bs-card-cap-color);
        background-color: var(--bs-card-cap-bg);
        border-top: var(--bs-card-border-width) solid var(--bs-card-border-color);
    }

    .card-footer:last-child {
        border-radius: 0 0 var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius);
    }

    .card-header-tabs {
        margin-right: calc(-0.5 * var(--bs-card-cap-padding-x));
        margin-bottom: calc(-1 * var(--bs-card-cap-padding-y));
        margin-left: calc(-0.5 * var(--bs-card-cap-padding-x));
        border-bottom: 0;
    }

    .card-header-tabs .nav-link.active {
        background-color: var(--bs-card-bg);
        border-bottom-color: var(--bs-card-bg);
    }

    .card-header-pills {
        margin-right: calc(-0.5 * var(--bs-card-cap-padding-x));
        margin-left: calc(-0.5 * var(--bs-card-cap-padding-x));
    }


    .bg-primary {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) !important;
    }

    .bg-secondary {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-secondary-rgb), var(--bs-bg-opacity)) !important;
    }

    .bg-success {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-success-rgb), var(--bs-bg-opacity)) !important;
    }

    .bg-info {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-info-rgb), var(--bs-bg-opacity)) !important;
    }

    .bg-warning {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-warning-rgb), var(--bs-bg-opacity)) !important;
    }

    .bg-danger {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-danger-rgb), var(--bs-bg-opacity)) !important;
    }

    .bg-light {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;
    }

    .text-primary {
        --bs-text-opacity: 1;
        color: rgba(var(--bs-primary-rgb), var(--bs-text-opacity)) !important;
    }

    .text-secondary {
        --bs-text-opacity: 1;
        color: rgba(var(--bs-secondary-rgb), var(--bs-text-opacity)) !important;
    }

    .text-success {
        --bs-text-opacity: 1;
        color: rgba(var(--bs-success-rgb), var(--bs-text-opacity)) !important;
    }

    .text-info {
        --bs-text-opacity: 1;
        color: rgba(var(--bs-info-rgb), var(--bs-text-opacity)) !important;
    }

    .text-warning {
        --bs-text-opacity: 1;
        color: rgba(var(--bs-warning-rgb), var(--bs-text-opacity)) !important;
    }

    .text-danger {
        --bs-text-opacity: 1;
        color: rgba(var(--bs-danger-rgb), var(--bs-text-opacity)) !important;
    }

    .text-white {
        --bs-text-opacity: 1;
        color: rgba(var(--bs-white-rgb), var(--bs-text-opacity)) !important;
    }


    /* ========== Reset dasar ========== */
    table {
        caption-side: bottom;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        text-align: inherit;
    }

    thead,
    tbody,
    tfoot,
    tr,
    td,
    th {
        border-color: inherit;
        border-style: solid;
        border-width: 0;
        vertical-align: top;
    }

    /* ========== Komponen utama .table ========== */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        /* ~ var(--bs-body-color) */
        background-color: transparent;
        border-color: #dee2e6;
        /* ~ var(--bs-border-color) */
        vertical-align: top;
        table-layout: fixed;
        /* bantu DomPDF merapikan kolom */
        word-wrap: break-word;
    }

    /* sel standar */
    .table thead th,
    .table tbody th,
    .table tfoot th,
    .table thead td,
    .table tbody td,
    .table tfoot td {
        padding: 0.5rem;
        background-color: transparent;
        border-bottom: 1px solid #dee2e6;
    }

    /* ========== Ukuran sel ringkas .table-sm ========== */
    .table-sm thead th,
    .table-sm tbody th,
    .table-sm tfoot th,
    .table-sm thead td,
    .table-sm tbody td,
    .table-sm tfoot td {
        padding: 0.25rem;
    }

    /* ========== Perbatasan ========== */
    .table-bordered,
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }

    .table-borderless tbody+tbody,
    .table-borderless td,
    .table-borderless th {
        border: 0;
    }

    /* Divider antarkelompok */
    .table-group-divider tbody+tbody {
        border-top: 2px solid currentColor;
    }

    /* ========== Striping baris & kolom ========== */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f2f2f2;
    }

    /* ≈ rgba(0,0,0,.05) */
    .table-striped-columns tr>*:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* ========== Hover & Active ========== */
    .table-hover tbody tr:hover {
        background-color: #ededed;
    }

    /* ≈ rgba(0,0,0,.075) */
    .table-active {
        background-color: #e6e6e6;
    }

    /* ≈ rgba(0,0,0,.10) */

    /* ========== Skema warna varian ========== */
    .table-primary,
    .table-primary th,
    .table-primary td {
        background-color: #cfe2ff;
        color: #000;
        border-color: #bacbe6;
    }

    .table-secondary,
    .table-secondary th,
    .table-secondary td {
        background-color: #e2e3e5;
        color: #000;
        border-color: #cbccce;
    }

    .table-success,
    .table-success th,
    .table-success td {
        background-color: #d1e7dd;
        color: #000;
        border-color: #bcd0c7;
    }

    .table-info,
    .table-info th,
    .table-info td {
        background-color: #cff4fc;
        color: #000;
        border-color: #badce3;
    }

    .table-warning,
    .table-warning th,
    .table-warning td {
        background-color: #fff3cd;
        color: #000;
        border-color: #e6dbb9;
    }

    .table-danger,
    .table-danger th,
    .table-danger td {
        background-color: #f8d7da;
        color: #000;
        border-color: #dfc2c4;
    }

    .table-light,
    .table-light th,
    .table-light td {
        background-color: #f8f9fa;
        color: #000;
        border-color: #dfe0e1;
    }

    .table-dark,
    .table-dark th,
    .table-dark td {
        background-color: #212529;
        color: #fff;
        border-color: #373b3e;
    }

    /* =======================================================================
   Grid 12‑kolom “ramah‑DomPDF” – .row & .col-*
   Prinsip:
   • Gunakan float :left + width % (bukan flexbox).
   • Gutter horizontal 0.75 rem (≈12 px) seperti Bootstrap.
   • Clearfix pada .row agar baris baru turun otomatis.
   • Semua ukuran ditulis eksplisit; tidak ada CSS variable.
   ======================================================================= */

    /* 1. Baris ----------------------------------------------------------------*/
    .row {
        display: block;
        /* bukan flex */
        clear: both;
        margin-left: 0;
        margin-right: 0;
        overflow: hidden;
    }

    .row::after {
        /* clearfix klasik */
        content: "";
        display: table;
        clear: both;
    }


    /* 2. Kolom dasar ----------------------------------------------------------*/
    .col,
    [class^="col-md-"] {
        float: left;
        box-sizing: border-box;

        /* Gunakan gutter hanya lewat padding (tidak perlu margin negatif di .row) */
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }

    /* 2a. Kolom otomatis (lebar sesuai konten) */
    .col,
    .col-auto {
        width: auto;
    }

    /* 3. Kolom numerik 1–12 ---------------------------------------------------*/
    .col-md-1 {
        width: 8.333333%;
    }

    .col-md-2 {
        width: 16.666667%;
    }

    .col-md-3 {
        width: 25.000000%;
    }

    .col-md-4 {
        width: 33.333333%;
    }

    .col-md-5 {
        width: 41.666667%;
    }

    .col-md-6 {
        width: 50.000000%;
    }

    .col-md-7 {
        width: 58.333333%;
    }

    .col-md-8 {
        width: 66.666667%;
    }

    .col-md-9 {
        width: 75.000000%;
    }

    .col-md-10 {
        width: 83.333333%;
    }

    .col-md-11 {
        width: 91.666667%;
    }

    .col-md-12 {
        width: 100.000000%;
    }

    /* 4. Offset opsional (jika perlu dorong ke kanan) -------------------------*/
    .offset-1 {
        margin-left: 8.333333%;
    }

    .offset-2 {
        margin-left: 16.666667%;
    }

    .offset-3 {
        margin-left: 25.000000%;
    }

    .offset-4 {
        margin-left: 33.333333%;
    }

    .offset-5 {
        margin-left: 41.666667%;
    }

    .offset-6 {
        margin-left: 50.000000%;
    }

    .offset-7 {
        margin-left: 58.333333%;
    }

    .offset-8 {
        margin-left: 66.666667%;
    }

    .offset-9 {
        margin-left: 75.000000%;
    }

    .offset-10 {
        margin-left: 83.333333%;
    }

    .offset-11 {
        margin-left: 91.666667%;
    }

    /* 5. Utilitas jarak antar‑baris (opsional) --------------------------------*/
    .mb-row-1 {
        margin-bottom: 0.25rem;
    }

    .mb-row-2 {
        margin-bottom: 0.5rem;
    }

    .mb-row-3 {
        margin-bottom: 1rem;
    }

    .mb-row-4 {
        margin-bottom: 1.5rem;
    }

    .mb-row-5 {
        margin-bottom: 3rem;
    }

    /* 6. Pembersih manual jika dibutuhkan -------------------------------------*/
    .clearfix {
        clear: both;
        /* inti pembersih float */
        display: block;
        /* pastikan elemen terlihat sebagai blok */
        width: 100%;
        /* lebar penuh baris */
        height: 0;
        /* tidak menambah tinggi (opsional) */
    }
</style>
