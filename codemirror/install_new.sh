#!/usr/bin/env sh

set -e

#directory must contains only script installation
if [[ $(ls -a1 | grep -vP '^\.{1,2}$' | wc -l) -eq 1 ]]; then
  git clone https://github.com/marijnh/CodeMirror.git .
fi
