# Miami Shoes
*E-commerce shoe retailer website*

---
Full-stack personal project created to practice skills accross the entire development process, from prototyping page designs to deployment on a home server. This project demonstrates practical applications of fundamental web development concepts including responsive design, communication with a web server, CRUD database operations, and much more. Use of libraries and frameworks was minimal in order to solidify understanding of core concepts, patterns, and languages.



**- What's New -**

*This website now runs on Docker containers! See installation instructions below to run locally.*

 

**Tech Stack**
- PHP
- SASS (CSS)
- Vanilla JavaScript
- MySQL
- Linux
- NGINX

## FRONT-END
**Skills demonstrated:**
- Prototyping in Adobe XD
- Responsive design
- CSS preprocessors
- Manipulating browser cookies
- Client-side form validation
- Accessibility

## BACK-END
**Skills demonstrated:**
- Writing SQL queries
- Database design
- Handling form data
- Data validation & sanitization
- Web server configuration
- Optimizing Performance
- Version control (git)
- Basic networking

## INSTALLATION
Docker is required to run this app locally. This site is not currently hosted publicly.

After cloning repo:

1. Navigate to project directory
```
cd miami-shoes
```
 
2. Set environment variables

Since this is a sample website, simply remove ".sample" from the provided .env file to use the pre-populated variables.
 
3. Build and run the containers
```
docker compose up -d
```
 
4. Restore database from provided backup (first build only)
- Start shell session in database container
```
docker exec -it miami-shoes-db /bin/bash
```
- Restore database from file, enter root password when prompted (from .env file)
```
mariadb -u root -p -D miami_shoes < /var/lib/mysql/backup
```
- **exit** shell session
 
5. Open app in browser at [localhost:3001](localhost:3001)
