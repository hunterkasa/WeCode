#include <bits/stdc++.h>
using namespace std;

typedef long long ll;
typedef long double ld;

template <typename T> T BigMod (T b,T p,T m){if (p == 0) return 1;if (p%2 == 0){T s = BigMod(b,p/2,m);return ((s%m)*(s%m))%m;}return ((b%m)*(BigMod(b,p-1,m)%m))%m;}

const ll mod = 998244353;
const int N = 2e5+100;
vector<int> g[N];
ll fact[N];

ll dfs( int x, int p ){
    ll ans = fact[g[x].size()];
    for ( int c : g[x] ){
        if ( c == p ) continue;
        ans = (ans * dfs(c,x)) % mod;
    }
    return ans;
}

void tohka(){

    int n;  cin >> n;
    for ( int i = 0; i < n-1; i++ ){
        int x, y;   cin >> x >> y;
        g[x].push_back(y);
        g[y].push_back(x);
    }

    fact[0] = 1;a
    for ( int i = 1; i < N; i++ ) fact[i] = (fact[i-1]*i) % mod;

    ll ans = 1;
    for ( int i = 1; i <= n; i++ ){
        if ( g[i].size() == 1 ){
            ans = (dfs(i,-1)*n) % mod;
            break;
        }
    }

    cout << ans << endl;

}

signed main(){
    
    tohka();

    return 0;
}        