@echo off
echo ========================================================
echo   Deploying Zymika Health to cPanel Live Server
echo ========================================================
echo.
echo 1. Committing and pushing local changes to GitHub...
git add .
git commit -m "deploy: update live site"
git push origin main
echo.
echo 2. Triggering live deployment webhook...
curl -s -X POST "https://zymikahealth.aussifydemowebsite.com/deploy-webhook?token=zymika_deploy_772910"
echo.
echo ========================================================
echo   Deployment completed! Check https://zymikahealth.aussifydemowebsite.com/
echo ========================================================
pause
