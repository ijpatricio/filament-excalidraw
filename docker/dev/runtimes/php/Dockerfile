############################################
# Base Image
############################################
FROM serversideup/php:8.3-fpm-nginx-bookworm AS base

############################################
# Development Image
############################################
FROM base AS development

# Switch to root so we can do root things
USER root

# Save the build arguments as a variable
ARG USER_ID
ARG GROUP_ID

# Install extensions
RUN install-php-extensions intl

# Install Node.js 20
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Alias
RUN echo "alias ll='ls -al'" >> /etc/bash.bashrc && \
    echo "alias a='php artisan'" >> /etc/bash.bashrc  && \
    echo "alias mfs='php artisan migrate:fresh --seed'" >> /etc/bash.bashrc  && \
    echo "alias cda='composer dump-autoload'" >> /etc/bash.bashrc  && \
    echo "alias run='./run'" >> /etc/bash.bashrc

# Use the build arguments to change the UID
# and GID of www-data while also changing
# the file permissions for NGINX
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID && \
    \
    # Update the file permissions for our NGINX service to match the new UID/GID
    docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID --service nginx

# Drop back to our unprivileged user
USER www-data
