create database breadshop default charset utf8mb4;
use breadshop;
drop database breadshop;

-- creata table
-- bread --
create table breadType(
	type_id varchar(255) primary key,
    type_name varchar(255) not null
);

create table bread (
	bread_id int auto_increment primary key ,
	type_id varchar(255),
    bread_name varchar(255) not null,
    bread_price int check(bread_price > 10000),
    bread_desc varchar(255),
    bread_url varchar(255),
    bread_amount int,
    foreign key (type_id) references breadType(type_id)
);

-- user --
create table userInfo(
	user_ID int auto_increment primary key,
    user_name varchar(255) not null,
    user_passwd varchar(255) not null,
    user_role boolean default 0,
    user_phoneNum varchar(10) CHECK (user_phoneNum regexp '^0[0-9]{9}$')
);

create table userDetail (
	user_ID int,
    detail_id int not null primary key auto_increment,
    detail_email varchar(255),
    detail_fname varchar(255),
    detail_address varchar(255),
    CONSTRAINT fk_userDetail_userID FOREIGN KEY (user_ID) REFERENCES userInfo(user_ID) ON DELETE CASCADE
);

-- cart - invoice --
create table invoice(
	invoice_ID int primary key auto_increment,
    user_ID int,
    invoice_date date,
    invoice_total int,
    status varchar(255) default 'chưa thanh toán',
    CONSTRAINT FOREIGN KEY (user_id) REFERENCES userinfo(user_id) ON DELETE CASCADE
);

 create table invoiceDetail(
	invoice_ID int,
    bread_id int ,
    quantity int, 
    cost int,
    CONSTRAINT FOREIGN KEY (invoice_ID) REFERENCES invoice(invoice_id) ON DELETE CASCADE,
    CONSTRAINT FOREIGN KEY (bread_id) REFERENCES bread(bread_id) ON DELETE CASCADE,
    primary key (invoice_ID,bread_id)
);


-- insert admin --
insert into userInfo (user_name, user_passwd, user_role)  values ('admin', 'admin123', 1);

-- insert bread_type --
INSERT INTO breadType (type_id, type_name) VALUES
('BN', 'Buns'),
('TT', 'Toasts'),
('SW', 'Sandwiches'),
('CK', 'Cakes'),
('CS', 'Cake Slices'),
('DK', 'Dry Cakes'),
('PUD', 'Pudding'),
('CKE', 'Cookies');

-- insert bread --
INSERT INTO bread (type_id, bread_name, bread_price, bread_desc, bread_url, bread_amount) VALUES
('BN', 'Bacon Cheese Onion', 32000, 'Delicious bun with bacon, cheese, and onion filling.', 'https://breadtalkvietnam.com/wp-content/uploads/2023/06/dsc03115_optimized.png', 10);

-- Toasts
INSERT INTO bread (type_id, bread_name, bread_price, bread_desc, bread_url, bread_amount) VALUES
('TT', 'Garlic Bread', 25000, 'Toasted bread with garlic butter spread.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScGqIei6Zg0mPHiBe3-yzE9OCRw4STGI33aWLb6BcNOA&s', 10);

-- Sandwiches
INSERT INTO bread (type_id, bread_name, bread_price, bread_desc, bread_url, bread_amount) VALUES
('SW', 'Chicken Sandwich', 35000, 'Sandwich filled with grilled chicken and vegetables.', 'https://www.indianhealthyrecipes.com/wp-content/uploads/2023/09/mayo-chicken-sandwich-recipe.jpg', 10);

-- Cakes
INSERT INTO bread (type_id, bread_name, bread_price, bread_desc, bread_url, bread_amount) VALUES
('CK', 'Chocolate Cake', 45000, 'Moist chocolate cake with rich chocolate frosting.', 'https://hips.hearstapps.com/hmg-prod/images/chocolate-cake-index-64b83bce2df26.jpg?crop=0.8891145524808891xw:1xh;center,top&resize=1200:*', 10);

-- Cake Slices
INSERT INTO bread (type_id, bread_name, bread_price, bread_desc, bread_url, bread_amount) VALUES
('CS', 'Cheesecake Slice', 38000, 'Creamy cheesecake slice with strawberry topping.', 'https://www.jocooks.com/wp-content/uploads/2018/11/cheesecake-1-22.jpg', 10);

-- Dry Cakes
INSERT INTO bread (type_id, bread_name, bread_price, bread_desc, bread_url, bread_amount) VALUES
('DK', 'Fruitcake', 28000, 'Traditional fruitcake with assorted dried fruits and nuts.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRf4luwULBjwCNAxZOQaNgLlXunAlRYy0E2be5BVXl5-Q&s', 10);

-- Pudding
INSERT INTO bread (type_id, bread_name, bread_price, bread_desc, bread_url, bread_amount) VALUES
('PUD', 'Bread Pudding', 30000, 'Classic bread pudding with vanilla sauce.', 'https://static01.nyt.com/images/2015/05/20/dining/20HIT_BREADPUDD/20HIT_BREADPUDD-square640.jpg', 10);

-- Cookies
INSERT INTO bread (type_id, bread_name, bread_price, bread_desc, bread_url, bread_amount) VALUES
('CKE', 'Chocolate Chip Cookies', 20000, 'Homemade chocolate chip cookies.', 'https://handletheheat.com/wp-content/uploads/2020/10/BAKERY-STYLE-CHOCOLATE-CHIP-COOKIES-9-637x637-1.jpg', 10);
select * from bread;
-- o --

-- Procedure 
-- Register --
DELIMITER //
CREATE PROCEDURE p_register (IN p_u_name varchar(255), in p_u_pass varchar(255),in p_u_phone varchar(10))
BEGIN
    insert into userinfo (user_name, user_passwd, user_phoneNum)
    values (p_u_name, p_u_pass, p_u_phone);
END //
DELIMITER ;

-- View Product --
DELIMITER //
CREATE PROCEDURE p_view_product (IN p_type_name varchar(255))
BEGIN
    select bread_id, type_name, bread_name, bread_price, bread_amount
    from bread b 
    join breadtype bt on b.type_id = bt.type_id
    where bt.type_name LIKE CONCAT('%', p_type_name, '%');
END //
DELIMITER ;
-- Test
call p_view_product ('Sandwiches');

-- Add Bread --
DELIMITER //
CREATE PROCEDURE p_add_bread (IN p_name varchar(255), in p_type_ID varchar(255), in p_price int, in p_amount int, in p_url varchar(255))
BEGIN
    insert into bread (
		bread_name,
		type_id, 
		bread_price,
        bread_amount,
		bread_url
    )
    value (p_name , p_type_ID, p_price , p_amount, p_url);
END //
DELIMITER ;

-- Add User_Info --
DELIMITER //
CREATE PROCEDURE p_add_user_info (
    IN p_u_name VARCHAR(255), 
    IN p_email VARCHAR(255), 
    IN p_f_name VARCHAR(255), 
    IN p_address VARCHAR(255)
)
BEGIN
    DECLARE p_user_id INT;
    DECLARE exist INT;
    
    -- Lấy user_ID dựa trên user_name
    SELECT user_ID INTO p_user_id FROM userInfo WHERE user_name = p_u_name;
    
    -- Kiểm tra xem người dùng đã tồn tại trong userdetail hay chưa
    SELECT COUNT(*) INTO exist FROM userdetail WHERE user_ID = p_user_id;
    
    IF exist > 0 THEN
        -- Nếu người dùng đã tồn tại, cập nhật thông tin của họ
        UPDATE userdetail 
        SET detail_email = p_email,
            detail_fname = p_f_name, 
            detail_address = p_address
        WHERE user_ID = p_user_id;
    ELSE
        -- Nếu người dùng chưa tồn tại, thêm thông tin của họ vào userdetail
        INSERT INTO userdetail (
            user_ID,
            detail_email,
            detail_fname,
            detail_address
        )
        VALUES (p_user_id , p_email, p_f_name , p_address);
    END IF;
END //

DELIMITER ;
-- Test
call p_add_user_info ('khucbaominh', 'khucbaominh@gmail.com', 'Khúc Bảo Minh', 'Nguyễn Văn Cừ, An Hoà, Ninh Kiều, Cần Thơ');

-- Add to Cart --
DELIMITER //
CREATE PROCEDURE p_add_to_cart (IN p_uname VARCHAR(250), IN p_brID INT, IN p_amount INT)
BEGIN
    DECLARE p_user_id INT;
    DECLARE p_order_id INT;
    DECLARE exist INT;
    DECLARE existing_quantity INT;

    -- Xác định ID của người dùng từ tên đăng nhập
    SELECT user_ID INTO p_user_id FROM userinfo WHERE user_name = p_uname;

    -- Kiểm tra xem đơn hàng chưa thanh toán nào của người dùng có chứa sản phẩm này chưa
    SELECT COUNT(*) INTO exist FROM invoice i
    INNER JOIN invoiceDetail id ON i.invoice_ID = id.invoice_ID
    WHERE id.bread_id = p_brID AND i.user_ID = p_user_id AND i.status = 'chưa thanh toán';
    
    IF exist > 0 THEN
        -- Cập nhật số lượng và giá sản phẩm
        UPDATE invoiceDetail 
        SET quantity = quantity + p_amount,
            cost = (SELECT bread_price FROM bread WHERE bread_id = p_brID) * (quantity + p_amount)
        WHERE bread_id = p_brID AND invoice_ID 
        IN (SELECT invoice_ID FROM invoice WHERE user_ID = p_user_id AND status = 'chưa thanh toán');
        
        -- Lấy số lượng hiện có của sách
        SELECT bread_amount INTO existing_quantity FROM bread WHERE bread_id = p_brID;
        
        -- Cập nhật số lượng còn lại của sách trong bảng Books
        UPDATE bread
        SET bread_amount = existing_quantity - p_amount
        WHERE bread_id = p_brID;
        
    ELSE
        -- Thêm dữ liệu vào Invoice
        INSERT INTO invoice (user_ID, invoice_date) VALUES (p_user_id, CURRENT_DATE());
        -- Lấy invoice_ID mới được thêm vào
        SELECT LAST_INSERT_ID() INTO p_order_id;
        -- Thêm dữ liệu vào bảng invoicedetail
        INSERT INTO invoiceDetail (invoice_ID, bread_id, quantity, cost) VALUES (p_order_id, p_brID, p_amount, (SELECT bread_price FROM bread WHERE bread_id = p_brID) * p_amount);
        
        -- Cập nhật số lượng còn lại của sách trong bảng bread
        UPDATE bread
        SET bread_amount = bread_amount - p_amount
        WHERE bread_id = p_brID;
    END IF;
END //

DELIMITER ;
-- test 
call p_add_to_cart('a', 5, 10);

select * from invoice i
join invoicedetail id on i.invoice_ID = id.invoice_ID
join bread b on id.bread_id = b.bread_id
join userinfo u ON i.user_ID = u.user_ID
WHERE u.user_name = 'a';

-- Total Cost --
SELECT userinfo.user_ID, SUM(cost) AS totalCost
    FROM invoicedetail 
    JOIN invoice ON invoice.invoice_ID = invoicedetail.invoice_ID
    JOIN userinfo ON invoice.user_ID = userinfo.user_ID
    WHERE user_name = 'khucbaominh' and invoice.status = 'chưa thanh toán'
    GROUP BY userinfo.user_ID;
    
-- delete cart --
DELIMITER //
CREATE PROCEDURE p_del_cart (IN p_inv_id INT)
BEGIN
    DECLARE p_brID INT;
    DECLARE p_amount INT;

    -- Lấy thông tin về sách và số lượng đã xoá từ chi tiết đơn hàng
    SELECT bread_id, quantity INTO p_brID, p_amount FROM invoicedetail WHERE invoice_ID = p_inv_id;
    
    -- Xoá dữ liệu trong chi tiết hoá đơn
    DELETE FROM invoicedetail WHERE invoice_ID = p_inv_id;
    
    -- Xoá dữ liệu trong hoá đơn
    DELETE FROM invoice WHERE invoice_ID = p_inv_id;
    
    -- Cập nhật số lượng của sách trong bảng bread
    UPDATE bread
     SET bread_amount = bread_amount + p_amount
     WHERE bread_id = p_brID;
END //

DELIMITER ;
-- Test
call p_del_cart (5);
