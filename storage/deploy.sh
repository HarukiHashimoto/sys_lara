#!bin/bash

echo -e "\033[0;32mDeploying updates to GitHub...\033[0m"

# Build the Project
hugo

cd public

# Add changes to git.
git add .

# Commit shanges.
# メッセージが記述されていなければテンプレートメッセージをセット
msg="rebuilding site `date`"
if [ $# -eq 1 ]
  then msg="$1"
fi
git commit -m "$msg"

# Push source.
git push origin master

cd ..

# Add changes to git.
git add .

# Commit changes.
msg="rebuild site `date`"
if [ $# -eq 1 ]
  then msg="$1"
fi
git commit -m "$msg"

# Push source
git push origin gh-pages

echo "Complete rebuild your Project!"
