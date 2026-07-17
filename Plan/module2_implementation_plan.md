# Implementation Plan: Module 2 - Product & Catalog Management

## 🎯 Goal Overview
Module 2 is responsible for allowing **Sellers** to create and manage their product catalogs, including handling complex variations (like size/color), categories, and pricing. Crucially, it includes **Admin Approval Gates**, meaning products created by sellers won't appear on the public storefront until an Admin reviews and approves them.

> **Inventory Notice:** As per the thesis requirements, direct CRUD on inventory stock levels is disabled. Therefore, while this Catalog module will define the SKUs and prices, the actual **stock quantities** will remain 0 until we build the Supplier/PO Inventory system (Module 3 & 4) later.

---

## 🏗️ Phase 1: Database Setup (Migrations)

Based on the thesis documentation, we will implement a highly normalized database structure for the catalog to support dynamic attributes.

### 1. Categories Table
- Allows infinite parent-child nesting (`parent_id`).
- Contains `name`, `slug`, `image_path`, `is_active`.

### 2. Attributes & Values
- `attributes`: Defines dynamic properties (e.g., Color, Size).
- `attribute_values`: The specific values (e.g., Red, XL).

### 3. Products Table
- Belongs to a Seller (via `seller_profiles` or `shops`).
- Belongs to a Category.
- Status enum (`draft`, `pending_review`, `approved`, `rejected`, `archived`) for the approval gate.
- Standard fields: `name`, `slug`, `description`.
- Supports `SoftDeletes`.

### 4. Product Variants Table
- Belongs to a Product.
- Contains the `sku` and `price`.
- Contains `attributes` (e.g., linked to attribute_values via pivot or stored as JSON).
- Does NOT allow direct stock editing (managed by Inventory module).

---

## ⚙️ Phase 2: Backend Models & Relationships

1. **Category**: `parent()`, `children()`, `products()`
2. **Attribute**: `values()`
3. **Product**: `shop()`, `category()`, `variants()`, `approvalLogs()`
4. **ProductVariant**: `product()`, `attributeValues()`

---

## 🔐 Phase 3: Controllers & RBAC Routes

1. **`Seller\ProductController` (Protected by `role:seller`)**
   - Handles Seller CRUD for their own products.
   - Automatically sets new/edited products to `pending_review`.
2. **`Admin\CatalogApprovalController` (Protected by `role:admin`)**
   - Queue of products awaiting review.
   - Functions to `approve` or `reject` with a reason.

---

## 🖥️ Phase 4: Frontend UI (Inertia + Vue3)

1. **Seller Product DataTable**: Using Shadcn to list all items and their approval status.
2. **Seller Product Form**: A dynamic form that generates Variant rows based on selected Attributes (e.g., clicking "Color: Red" and "Size: L" creates a SKU row for Red-L).
3. **Admin Approval Queue**: A dashboard for Admins to quickly review photos, descriptions, and click Approve/Reject.
