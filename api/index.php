<?php
/**
 * EarthGreenEnergy Bangladesh - Vercel Serverless Function Gateway
 * Sets current working directory to project root and loads public front controller.
 */
chdir(__DIR__ . '/..');
require_once __DIR__ . '/../public/index.php';
