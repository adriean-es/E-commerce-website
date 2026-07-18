# Implementation Plan: Module 3 - Supplier & Procurement

## 🎯 Goal Overview
Module 3 is responsible for establishing the relationship between Sellers and their Suppliers. It enables Sellers to invite external suppliers to the platform, and create formal Purchase Orders (POs) to request inventory. The PO lifecycle creates a formal state machine (`draft` -> `sent` -> `acknowledged` -> `approved`) which will later be used by Module 4 (Inventory) for stock receipts.

## User Review Required
> [!IMPORTANT]
> The database schema includes a `supplier_profiles` table which connects to the `users` table, and a `seller_suppliers` pivot table to represent the Many-to-Many relationship (since one supplier can supply multiple sellers). Please review the proposed database structures and confirm if they align with your requirements.

## Proposed Changes

### 1. Database Migrations
#### [NEW] `database/migrations/xxxx_xx_xx_create_supplier_tables.php`
- `supplier_profiles`: Stores company name, address, contact person.
- `supplier_invitations`: Stores the token for onboarding new suppliers.
- `seller_suppliers`: Many-to-many pivot table for seller-supplier relationships.

#### [NEW] `database/migrations/xxxx_xx_xx_create_purchase_order_tables.php`
- `purchase_orders`: The main PO record (status, total amount, delivery address).
- `purchase_order_items`: The individual variants ordered (quantity, unit cost).
- `purchase_order_status_logs`: Immutable audit log of PO status changes.

---

### 2. Models & Relationships
- **SupplierProfile**: Belongs to User, belongsToMany Shops (Sellers), hasMany PurchaseOrders.
- **SupplierInvitation**: Belongs to Shop (Seller).
- **PurchaseOrder**: Belongs to Shop (Seller), SupplierProfile, and User (creator). HasMany PurchaseOrderItems, PurchaseOrderStatusLogs.
- **PurchaseOrderItem**: Belongs to PurchaseOrder and ProductVariant.

---

### 3. Controllers & Routes
#### [NEW] `app/Http/Controllers/Seller/SupplierController.php`
- Protected by `role:seller`.
- Logic for listing suppliers, creating invitations, and managing relationships.
#### [NEW] `app/Http/Controllers/Seller/PurchaseOrderController.php`
- Protected by `role:seller`.
- Logic for creating POs, adding items, and submitting them to the supplier.
#### [NEW] `app/Http/Controllers/Supplier/SupplierDashboardController.php` & `PurchaseOrderController.php`
- Protected by `role:supplier`.
- Logic for the supplier to accept invitations, view incoming POs, acknowledge, and approve them.

---

### 4. Frontend UI (Inertia + Vue3)
- **Seller - Suppliers List (`Seller/Suppliers/Index.vue`)**: Data table of active suppliers and a modal to invite via email.
- **Seller - PO Management (`Seller/PurchaseOrders/Index.vue`, `Create.vue`)**: Interface to build a PO by selecting a supplier and adding variants.
- **Supplier - Dashboard & PO Review (`Supplier/Dashboard.vue`, `Supplier/PurchaseOrders/Show.vue`)**: Supplier portal to review incoming POs and click "Acknowledge" or "Approve".

## Verification Plan
### Automated Tests
- N/A for this phase.
### Manual Verification
- Seed a test Supplier account.
- Log in as the Vendor, create a Purchase Order, and send it.
- Log in as the Supplier, view the PO, acknowledge it, and approve it.
- Verify that status changes correctly update the database and write to the PO status logs.
