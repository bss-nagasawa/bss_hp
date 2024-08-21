# WordPressの最新版をダウンロード
Invoke-WebRequest -Uri https://wordpress.org/latest.zip -OutFile latest.zip

# ダウンロードしたファイルを解凍
Expand-Archive -Path latest.zip -DestinationPath .

# 解凍したファイルを移動
# 既存のファイルやディレクトリを無視する
Get-ChildItem -Path .\wordpress | ForEach-Object {
    $destinationPath = Join-Path -Path . -ChildPath $_.Name
    if (-not (Test-Path -Path $destinationPath)) {
        Move-Item -Path $_.FullName -Destination . -Recurse
    }
}

# 不要なファイルを削除
Remove-Item -Path latest.zip
Remove-Item -Path .\wordpress -Recurse

# Write-Output "WordPressのインストールが完了しました。"
