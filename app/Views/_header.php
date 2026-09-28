<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Peralta POS') ?></title>
    <style>
        :root { --ink: #202124; --muted: #667085; --accent: #b42318; --line: #e4e7ec; --paper: #fff; --wash: #f8f9fb; }
        * { box-sizing: border-box; }
        body { margin: 0; color: var(--ink); background: var(--wash); font-family: Arial, sans-serif; line-height: 1.6; }
        header { background: var(--ink); color: white; }
        .nav, main { width: min(100% - 2rem, 980px); margin: 0 auto; }
        .nav { display: flex; align-items: center; justify-content: space-between; gap: 1rem; min-height: 4.5rem; }
        .brand { color: white; font-weight: 700; text-decoration: none; letter-spacing: .08em; }
        nav { display: flex; flex-wrap: wrap; gap: .25rem; }
        nav a { color: #d0d5dd; padding: .55rem .75rem; text-decoration: none; border-radius: .35rem; }
        nav a:hover, nav a:focus { color: white; background: #344054; }
        main { padding: 4rem 0; }
        .eyebrow { color: var(--accent); font-size: .8rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; }
        h1 { margin: .35rem 0 1rem; font-size: clamp(2rem, 5vw, 3.5rem); line-height: 1.1; }
        h2 { margin-top: 0; }
        .intro { color: var(--muted); max-width: 620px; font-size: 1.1rem; }
        .actions { display: flex; flex-wrap: wrap; gap: .75rem; margin-top: 2rem; }
        .button { background: var(--accent); color: white; display: inline-block; padding: .7rem 1rem; text-decoration: none; border-radius: .35rem; font-weight: 700; }
        .button.secondary { background: white; color: var(--ink); border: 1px solid var(--line); }
        .panel { background: var(--paper); border: 1px solid var(--line); border-radius: .5rem; padding: 1.5rem; box-shadow: 0 8px 24px rgba(16, 24, 40, .05); }
        table { width: 100%; border-collapse: collapse; margin-top: 1.5rem; }
        th, td { border-bottom: 1px solid var(--line); padding: .9rem .75rem; text-align: left; }
        th { color: var(--muted); font-size: .8rem; letter-spacing: .06em; text-transform: uppercase; }
        .form-panel { max-width: 680px; }
        label { display: block; color: var(--muted); font-size: .9rem; font-weight: 700; margin-top: 1rem; }
        input, textarea, select { border: 1px solid var(--line); border-radius: .35rem; display: block; font: inherit; margin-top: .35rem; padding: .7rem; width: 100%; }
        .error { color: var(--accent); font-size: .9rem; margin: .35rem 0 0; }
        .notice { background: #ecfdf3; border: 1px solid #abefc6; border-radius: .35rem; color: #067647; padding: .75rem 1rem; }
        .row-actions { display: flex; flex-wrap: wrap; gap: .75rem; align-items: center; }
        .row-actions form { margin: 0; }
        .link-button { background: none; border: 0; color: var(--accent); cursor: pointer; font: inherit; padding: 0; text-decoration: underline; }
        .thumbnail { border-radius: .25rem; height: 52px; object-fit: cover; width: 52px; }
        footer { color: var(--muted); font-size: .9rem; padding: 0 0 2rem; text-align: center; }
        @media (max-width: 620px) { .nav { align-items: flex-start; flex-direction: column; padding: 1rem 0; } nav { width: 100%; } th, td { padding: .7rem .4rem; } }
    </style>
</head>
<body>
<header>
    <div class="nav">
        <a class="brand" href="<?= url_to('home') ?>">PERALTA POS</a>
        <nav aria-label="Main navigation">
            <a href="<?= url_to('home') ?>">Home</a>
            <a href="<?= url_to('about') ?>">About</a>
            <a href="<?= url_to('products') ?>">Products</a>
            <a href="<?= url_to('customers') ?>">Customers</a>
            <a href="<?= url_to('users') ?>">Users</a>
            <a href="<?= url_to('sales') ?>">Sales history</a>
        </nav>
    </div>
</header>
<main>