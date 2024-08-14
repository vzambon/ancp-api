#!/usr/bin/bash

set -e

cf_ips() {
echo "# https://www.cloudflare.com/ips"

for type in v4 v6; do
echo "# IP$type"
curl -sL "https://www.cloudflare.com/ips-$type/" | sed "s|^|allow |g" | sed "s|\$|;|g"
echo
done

echo "# Generated at $(LC_ALL=C date)"
}

(cf_ips && echo "deny all; # deny all remaining ips") > /etc/nginx/allow-cloudflare-only.conf

# restart Nginx
reload_flag=false

# Loop through all command-line arguments
for arg in "$@"; do
    if [[ "$arg" == "--reload" ]]; then
        # Set the reload_flag to true if --reload is detected
        reload_flag=true
        break
    fi
done

if $reload_flag; then
    nginx -s reload
else
    echo "Not reloading nginx"
fi