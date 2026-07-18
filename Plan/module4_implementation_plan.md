# Implementation Plan: Module 4 - Inventory Management

## Goal Overview
Module 4 implements a ledger-based inventory system where stock levels are a derived value, never directly set. Every change to quantity goes through `InventoryService::recordTransaction()`, creating an immutable audit trail. The module handles: Stock Receipt from approved POs, Manual Adjustments with approval workflow, and an Inventory Dashboard with transaction history.

## Proposed Changes

### 1. Database Migration
#### [NEW] `database/migrations/xxxx_create_inventory_tables.php`
- `inventories`: Tracks qty_on_hand, qty_reserved, reorder_point per variant per shop.
- `inventory_transactions`: Immutable ledger (append-only, no updated_at).
- `stock_receipts` + `stock_receipt_items`: Records goods received against POs.
- `inventory_adjustments`: Manual corrections requiring approval.

### 2. Models
- `Inventory`, `InventoryTransaction`, `StockReceipt`, `StockReceiptItem`, `InventoryAdjustment`
- **Security**: `Inventory` model has `$fillable = []` for `quantity_on_hand` — only modifiable via InventoryService.

### 3. Service Layer
#### [NEW] `app/Services/InventoryService.php`
- `recordTransaction()`: Atomically writes transaction log + updates quantity.
- `receiveStock()`: Processes stock receipt from PO, creates receipt records, calls recordTransaction per item.
- `applyAdjustment()`: Applies approved manual adjustments.

### 4. Controllers & Routes
#### [NEW] `app/Http/Controllers/Seller/InventoryController.php`
- Dashboard view, receive stock form, manual adjustment form, adjustment approval.

### 5. Frontend (Vue3 + Inertia)
- `Seller/Inventory/Index.vue`: Dashboard with stock levels table.
- `Seller/Inventory/ReceiveStock.vue`: Form to receive goods against a PO.
- `Seller/Inventory/Adjustments.vue`: List and create manual adjustments.
- `Seller/Inventory/TransactionLog.vue`: View full transaction history for a variant.

## Verification Plan
- Receive stock from an approved PO → verify inventory increases.
- Create a manual adjustment → approve it → verify inventory updates.
- Check transaction log shows full audit trail.
