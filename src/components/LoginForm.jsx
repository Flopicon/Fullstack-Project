
import React, { useState } from 'react';
import { LockOutlined, UserOutlined } from '@ant-design/icons';
import { Button, Checkbox, Flex, Form, Input, message } from 'antd';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';

function LoginForm() {
  const { signIn } = useAuth();
  const navigate = useNavigate();
  const [busy, setBusy] = useState(false);

  const onFinish = async (values) => {
    setBusy(true);

    try {
      // Laravel login (use email if your backend authenticates by email)
      const user = await signIn({
        email: values.username,
        password: values.password,
      });

      message.success('Login successful!');

      if (user?.role === 'admin') {
        navigate('/dashboard', { replace: true });
      } else {
        navigate('/order', { replace: true });
      }
    } catch (error) {
      message.error(
        error.response?.data?.message ||
        'Invalid username or password'
      );
    } finally {
      setBusy(false);
    }
  };

  return (
    <Form
      name="login"
      initialValues={{ remember: true }}
      onFinish={onFinish}
      autoComplete="off"
      layout="vertical"
    >
      <Form.Item
        name="username"
        rules={[{ required: true, message: 'Please input your email!' }]}
      >
        <Input
          prefix={<UserOutlined />}
          placeholder="Email"
        />
      </Form.Item>

      <Form.Item
        name="password"
        rules={[
          { required: true, message: 'Please input your password!' },
          { min: 6, message: 'Password must be at least 6 characters!' },
        ]}
      >
        <Input
          prefix={<LockOutlined />}
          type="password"
          placeholder="Password"
        />
      </Form.Item>

      <Form.Item>
        <Flex justify="space-between" align="center">
          <Form.Item
            name="remember"
            valuePropName="checked"
            noStyle
          >
            <Checkbox>Remember me</Checkbox>
          </Form.Item>

          <a href="#forgot-password">Forgot password?</a>
        </Flex>
      </Form.Item>

      <Form.Item>
        <Button
          block
          type="primary"
          htmlType="submit"
          loading={busy}
        >
          Log in
        </Button>
      </Form.Item>
    </Form>
  );
}

export default LoginForm;
