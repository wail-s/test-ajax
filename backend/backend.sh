dirname=$(realpath `dirname $0`)
entrypoint="$dirname"/public/

php -S localhost:7000 -t "$entrypoint"
