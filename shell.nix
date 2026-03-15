{ pkgs ? import <nixpkgs> {} }:
pkgs.mkShell {
  buildInputs = [
    pkgs.php84
    pkgs.php84Packages.composer
    pkgs.symfony-cli
    pkgs.sqlite
    pkgs.tailwindcss  # On ajoute le vrai Tailwind de Nix ici
  ];
  shellHook = ''
    echo "--- Environnement Cercle Duclos (PHP 8.4 + Tailwind) prêt ---"
  '';
}
