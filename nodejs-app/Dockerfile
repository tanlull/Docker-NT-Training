FROM node:16-alpine
WORKDIR /usr/src/app
COPY package*.json ./
# Dev
#RUN npm install
# production 
RUN npm ci --only=production
ENV NODE_ENV production
COPY ./ ./
EXPOSE 3000
CMD ["node", "./bin/www"]