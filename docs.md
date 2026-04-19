PROJECT DOCUMENTATION
=====================

Project Title: Real Estate Agency Management System
Platform: MAMP (PHP, MySQL, Apache)
Priority Focus: Buyer Dashboard

---------------------------------------------------
1. INTRODUCTION
---------------------------------------------------
The Real Estate Agency Management System is a web-based platform designed to streamline property sales and agency operations. Built on MAMP, the system provides role-based dashboards for buyers, agents, and administrators. The buyer dashboard is the central hub, offering property images, balance history, saved houses, and recommendations — ensuring buyers have a transparent and professional experience.

---------------------------------------------------
2. OBJECTIVES
---------------------------------------------------
- Deliver a professional, minimal dashboard for buyers.
- Provide balance history for financial transparency.
- Display property images of houses buyers are purchasing.
- Enable agents to manage listings and sales.
- Allow administrators to oversee users and property approvals with limited functionality.

---------------------------------------------------
3. SYSTEM ARCHITECTURE
---------------------------------------------------
Technology Stack:
- Frontend: HTML5, CSS3, JavaScript, Bootstrap/Tailwind CSS
- Backend: PHP (MVC structure)
- Database: MySQL (via phpMyAdmin)
- Server: Apache (MAMP)

Architecture Flow:
- Client (Browser) → Apache Server (PHP) → MySQL Database
- Role-based routing ensures buyers land directly on their dashboard after login.

---------------------------------------------------
4. DATABASE DESIGN
---------------------------------------------------
Tables:
- Users: id, name, email, password, role (admin/agent/buyer)
- Properties: id, title, description, price, location, agent_id, status
- PropertyImages: id, property_id, image_url, caption
- Transactions: id, property_id, buyer_id, agent_id, date, status
- BalanceHistory: id, buyer_id, transaction_id, amount, type (credit/debit), date, description

Relationships:
- One agent → many properties
- One property → many images
- One buyer → many balance history records

---------------------------------------------------
5. DASHBOARDS
---------------------------------------------------
Buyer Dashboard (Priority):
- House Pictures: Carousel/gallery of the property being purchased
- Balance History: Deposits, payments, refunds, running balance
- Saved Houses: Bookmarked properties
- Recommended Properties: Suggestions based on preferences

Agent Dashboard:
- Manage property listings (add/edit/delete)
- View buyer inquiries (minimal)
- Track sales status

Admin Dashboard:
- Approve/reject property listings
- Manage users (activate/deactivate accounts)
- View system overview (basic stats only)

---------------------------------------------------
6. FUNCTIONAL REQUIREMENTS
---------------------------------------------------
- Authentication: Secure login, registration, password hashing
- Buyer Dashboard: Display property images, balance history, saved houses, recommendations
- Property Management: Agents add/edit/delete properties with images
- Transactions: Record property sales and link to buyer balance history
- Admin Controls: Approve listings, manage users

---------------------------------------------------
7. NON-FUNCTIONAL REQUIREMENTS
---------------------------------------------------
- Security: Role-based access, SQL injection prevention, password encryption
- Performance: Optimized queries, lightweight dashboard
- Usability: Clean, responsive design with Bootstrap/Tailwind
- Scalability: Database normalization for future expansion

---------------------------------------------------
8. IMPLEMENTATION PLAN
---------------------------------------------------
Phase 1: Database setup and authentication
Phase 2: Buyer dashboard development (priority)
Phase 3: Agent dashboard and property management
Phase 4: Transactions and balance history integration
Phase 5: Admin approvals and user management

---------------------------------------------------
9. BUYER DASHBOARD LAYOUT (UI STRUCTURE)
---------------------------------------------------
Sections:
- House Pictures: Image carousel/gallery
- Balance History: Table of transactions
- Saved Houses: Card-based list
- Recommended Properties: Card-based list

---------------------------------------------------
10. FUTURE ENHANCEMENTS
---------------------------------------------------
- Export balance history as PDF/Excel
- Add charts for spending trends
- Integrate Google Maps for property locations
- Enable virtual tours or 360° house views

---------------------------------------------------
11. CONCLUSION
---------------------------------------------------
This documentation defines a professional real estate management system built with MAMP. By prioritizing the buyer dashboard — with property images, balance history, saved houses, and recommendations — the system ensures transparency, usability, and professionalism. Agents and admins retain only the necessary tools, keeping the platform efficient and scalable.
