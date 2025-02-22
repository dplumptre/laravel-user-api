FROM nginx:alpine

# Set working directory
WORKDIR /etc/nginx/

# Copy Nginx configuration files into the correct directory
COPY ./dockerfiles/nginx/default.conf /etc/nginx/conf.d/

# Copy Laravel files into the Nginx container
COPY ./ /var/www/

# Set correct permissions
RUN chmod -R 755 /var/www && chown -R nginx:nginx /var/www

# Expose port 80
EXPOSE 80
