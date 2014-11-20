#!/usr/bin/env sh

set -e

EDITOR_DIR_NAME='codemirror'

#directory must contains only script installation
if [ -e $EDITOR_DIR_NAME ]; 
then
  echo '!!!'
  echo "!!! Directory '$EDITOR_DIR_NAME' already exists."
  echo '!!! Please, remove it if necessary.'
  echo "!!! rm -rf '$EDITOR_DIR_NAME'"
  echo '!!!'
else
  git clone https://github.com/marijnh/CodeMirror.git $EDITOR_DIR_NAME
fi
