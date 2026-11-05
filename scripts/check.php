<?php
// Stub judge: red without the label, green with it. Exists only to measure GitHub's behaviour.
$repo = getenv('REPO'); $pr = getenv('PR');
exec('gh api repos/'.$repo.'/issues/'.$pr.'/labels --jq ".[].name"', $out, $st);
if ($st !== 0) { fwrite(STDERR, "cannot measure\n"); exit(2); }
echo "script: main's copy; labels: ".implode(',', $out)."\n";
exit(in_array('boundary-approved', $out, true) ? 0 : 1);
