dirname=$(realpath `dirname $0`)

open http://localhost:8000
php -S localhost:8000 -t "$dirname"

